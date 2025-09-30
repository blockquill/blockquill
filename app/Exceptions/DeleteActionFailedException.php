<?php

namespace App\Exceptions;

use Exception;

class DeleteActionFailedException extends Exception
{
    public static function relatedRecordDeleteActionFailed(?string $message = null): DeleteActionFailedException
    {
        return new self($message ?? 'Delete action failed because of related records.');
    }
}
