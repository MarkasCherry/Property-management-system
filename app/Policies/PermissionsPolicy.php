<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionsPolicy
{
    use HandlesAuthorization;

    public function createAdministrators(User $user)
    {
        return $user->hasPermissionTo('Create administrators', 'web') ? true : abort(403);
    }

    public function editAdministrators(User $user)
    {
        return $user->hasPermissionTo('Edit administrators', 'web') ? true : abort(403);
    }

    public function viewAdministrators(User $user)
    {
        return $user->hasPermissionTo('View administrators', 'web') ? true : abort(403);
    }

    public function deleteAdministrators(User $user)
    {
        return $user->hasPermissionTo('Delete administrators', 'web') ? true : abort(403);
    }
}
