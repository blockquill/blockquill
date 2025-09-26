<?php

namespace App\Policies;

use App\Models\MediaDirectory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaDirectoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any:media_directory');
    }

    public function view(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('view:media_directory');
    }

    public function create(User $user): bool
    {
        return $user->can('create:media_directory');
    }

    public function update(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('update:media_directory');
    }

    public function delete(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('delete:media_directory');
    }

    public function restore(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('restore:media_directory');
    }

    public function forceDelete(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('force_delete:media_directory');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any:media_directory');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any:media_directory');
    }

    public function replicate(User $user, MediaDirectory $mediaDirectory): bool
    {
        return $user->can('replicate:media_directory');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder:media_directory');
    }
}
