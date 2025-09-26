<?php

namespace App\Policies;

use App\Models\PostMeta;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostMetaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any:post_meta');
    }

    public function view(User $user, PostMeta $postMeta): bool
    {
        return $user->can('view:post_meta');
    }

    public function create(User $user): bool
    {
        return $user->can('create:post_meta');
    }

    public function update(User $user, PostMeta $postMeta): bool
    {
        return $user->can('update:post_meta');
    }

    public function delete(User $user, PostMeta $postMeta): bool
    {
        return $user->can('delete:post_meta');
    }

    public function restore(User $user, PostMeta $postMeta): bool
    {
        return $user->can('restore:post_meta');
    }

    public function forceDelete(User $user, PostMeta $postMeta): bool
    {
        return $user->can('force_delete:post_meta');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any:post_meta');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any:post_meta');
    }

    public function replicate(User $user, PostMeta $postMeta): bool
    {
        return $user->can('replicate:post_meta');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder:post_meta');
    }
}
