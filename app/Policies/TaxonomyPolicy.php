<?php

namespace App\Policies;

use App\Models\Taxonomy;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaxonomyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any:taxonomy');
    }

    public function view(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('view:taxonomy');
    }

    public function create(User $user): bool
    {
        return $user->can('create:taxonomy');
    }

    public function update(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('update:taxonomy');
    }

    public function delete(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('delete:taxonomy');
    }

    public function restore(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('restore:taxonomy');
    }

    public function forceDelete(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('force_delete:taxonomy');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any:taxonomy');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any:taxonomy');
    }

    public function replicate(User $user, Taxonomy $taxonomy): bool
    {
        return $user->can('replicate:taxonomy');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder:taxonomy');
    }
}
