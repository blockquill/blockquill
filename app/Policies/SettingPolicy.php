<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any:setting');
    }

    public function view(User $user, Setting $setting): bool
    {
        return $user->can('view:setting');
    }

    public function create(User $user): bool
    {
        return $user->can('create:setting');
    }

    public function update(User $user, Setting $setting): bool
    {
        return $user->can('update:setting');
    }

    public function delete(User $user, Setting $setting): bool
    {
        return $user->can('delete:setting');
    }

    public function restore(User $user, Setting $setting): bool
    {
        return $user->can('restore:setting');
    }

    public function forceDelete(User $user, Setting $setting): bool
    {
        return $user->can('force_delete:setting');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any:setting');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any:setting');
    }

    public function replicate(User $user, Setting $setting): bool
    {
        return $user->can('replicate:setting');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder:setting');
    }
}
