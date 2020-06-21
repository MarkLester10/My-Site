<?php

namespace App\Model\Admin;

use App\Model\Admin\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
