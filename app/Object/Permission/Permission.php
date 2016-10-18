<?php

namespace App\Object\Permission;

use App\Object\CC\Entity;

class Permission extends Entity
{
	public $table = 'cc_permissions';
   	
    public $timestamps = false;

    public $object_name = "Permission";

    public $columns_list = [
    	'permission_name'=>'permissionname'
    ];
}


