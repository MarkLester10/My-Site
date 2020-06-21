<?php

namespace App\Model\Admin;

use App\Model\Admin\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permissions_role');
    }
}
