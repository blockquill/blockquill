<?php

namespace App\Policies;

use App\Models\Media;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any:media');
    }

    public function view(User $user, Media $media): bool
    {
        return $user->can('view:media');
    }

    public function create(User $user): bool
    {
        return $user->can('create:media');
    }

    public function update(User $user, Media $media): bool
    {
        return $user->can('update:media');
    }

    public function delete(User $user, Media $media): bool
    {
        return $user->can('delete:media');
    }

    public function restore(User $user, Media $media): bool
    {
        return $user->can('restore:media');
    }

    public function forceDelete(User $user, Media $media): bool
    {
        return $user->can('force_delete:media');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any:media');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any:media');
    }

    public function replicate(User $user, Media $media): bool
    {
        return $user->can('replicate:media');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder:media');
    }
}
