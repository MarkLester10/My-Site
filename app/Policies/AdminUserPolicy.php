<?php

namespace App\Policies;

use App\Model\Admin\Admin;
use App\Model\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Model\User\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function view(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Model\User\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user, 5);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $this->getPermission($user, 6);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user, 7);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function restore(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function forceDelete(User $user, Admin $admin)
    {
        //
    }

    public function permission(Admin $user)
    {
        return $this->getPermission($user, 1);
    }

    public function role(Admin $user)
    {
        return $this->getPermission($user, 1);
    }

    protected function getPermission($user, $permission_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $permission_id) {
                    return true;
                }
            }
        }
        return false;
    }
}
