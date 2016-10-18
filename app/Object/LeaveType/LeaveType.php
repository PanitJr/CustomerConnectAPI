<?php

namespace App\Object\LeaveType;

use App\Object\CC\Entity;

class LeaveType extends Entity
{
	public $table = 'cc_leavetypes';
   	
    public $timestamps = false;

    public $object_name = "LeaveType";

    public $columns_list = [
    	'leave_type_name'=>'leavetypename'
    ];
}


