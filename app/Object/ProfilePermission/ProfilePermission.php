<?php

namespace App\Object\ProfilePermission;

use App\Object\CC\Entity;

class ProfilePermission extends Entity
{
	public $table = 'cc_profilepermissions';
   	
    public $timestamps = false;

    public $object_name = "ProfilePermission";

    public $columns_list = [
    	'profile_permission_name'=>'profilepermissionname'
    ];
}


