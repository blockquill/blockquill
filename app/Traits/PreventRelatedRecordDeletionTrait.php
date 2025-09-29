<?php

namespace App\Traits;

use App\Exceptions\DeleteActionFailedException;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionMethod;

trait PreventRelatedRecordDeletionTrait
{
    public static function bootPreventRelatedRecordDeletionTrait(): void
    {
        static::deleting(
            /**
             * @throws \ReflectionException
             **/
            function ($model) {
                $reflection = new ReflectionClass($model); //@phpstan-ignore-line
                $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);

                foreach ($methods as $method) {
                    // Skip the roles method in the User model
                    if (get_class($model) == User::class && $method->name == 'roles') { //@phpstan-ignore-line
                        continue;
                    }
                    // Skip static methods and the ones that don't have return type hints
                    if (! $method->hasReturnType()) {
                        continue;
                    }

                    // Get the return type of the method

                    $returnType = $method->getReturnType();
                    /** @phpstan-ignore-next-line  */
                    if ($returnType && ! $returnType->isBuiltin()) {

                        // Check if the return type is a subclass of Illuminate\Database\Eloquent\Relations\Relation

                        /** @phpstan-ignore-next-line  */
                        $typeName = $returnType->getName();

                        if (in_array($typeName, [HasMany::class, HasOne::class, BelongsToMany::class])) {
                            if ($model->{$method->name}()->exists()) { //@phpstan-ignore-line

                                $modalName = Str::headline($method->name);
                                throw DeleteActionFailedException::relatedRecordDeleteActionFailed("Cannot delete this record because it has related records in the $modalName");
                            }
                        }
                    }
                }
            }
        );
    }
}
