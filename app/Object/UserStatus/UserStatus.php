<?php

namespace App\Object\UserStatus;

use App\Object\CC\Entity;

class UserStatus extends Entity
{
	public $table = 'cc_userstatuss';
   	
    public $timestamps = false;

    public $object_name = "UserStatus";

    public $columns_list = [
    	'user_status_name'=>'userstatusname'
    ];
}


