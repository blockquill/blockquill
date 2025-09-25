<?php

namespace App\Policies;

use App\Models\MediaDirectory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaDirectoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any:media_directory');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('view:media_directory');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create:media_directory');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('update:media_directory');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('delete:media_directory');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('restore:media_directory');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('force_delete:media_directory');
    }
}
