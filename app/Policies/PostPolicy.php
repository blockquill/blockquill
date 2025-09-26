<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any:post');
    }

    public function view(User $user, Post $post): bool
    {
        return $user->can('view:post');
    }

    public function create(User $user): bool
    {
        return $user->can('create:post');
    }

    public function update(User $user, Post $post): bool
    {
        return $user->can('update:post');
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->can('delete:post');
    }

    public function restore(User $user, Post $post): bool
    {
        return $user->can('restore:post');
    }

    public function forceDelete(User $user, Post $post): bool
    {
        return $user->can('force_delete:post');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any:post');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any:post');
    }

    public function replicate(User $user, Post $post): bool
    {
        return $user->can('replicate:post');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder:post');
    }
}
