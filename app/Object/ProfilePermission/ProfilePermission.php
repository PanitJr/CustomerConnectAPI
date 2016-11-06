<?php

namespace App\Object\ProfilePermission;

use App\Object\CC\Entity;
use App\Object\Permission\Permission;
use App\Object\Profile\Profile;

class ProfilePermission extends Entity
{
	public $table = 'cc_profilepermissions';
   	
    public $timestamps = false;

    public $object_name = "ProfilePermission";

    public $columns_list = [
    	'profile_permission_name'=>'profilepermissionname'
    ];

    public function profile()
    {
        return $this->hasMany(Profile::class,'id','profile_id');
    }

    public function permission()
    {
        return $this->hasMany(Permission::class,'id','permission_id');
    }
}


