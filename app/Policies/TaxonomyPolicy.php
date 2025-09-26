<?php

namespace App\Policies;

use App\Models\Taxonomy;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaxonomyPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any:taxonomy');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('view:taxonomy');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create:taxonomy');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('update:taxonomy');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('delete:taxonomy');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('restore:taxonomy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('force_delete:taxonomy');
    }
}
