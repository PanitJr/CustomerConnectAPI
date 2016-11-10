<?php

namespace App\Object\profilewithpermission;

use App\Object\CC\Entity;

class profilewithpermission extends Entity
{
	public $table = 'cc_profilewithpermissions';
   	
    public $timestamps = false;

    public $object_name = "profilewithpermission";

    public $columns_list = [
    	'profilewithpermission'=>'profilewithpermission'
    ];
}


