<?php

namespace App\Object\Leave;

use App\Object\CC\Entity;
use App\User;
use App\Object\LeaveType\LeaveType;


class Leave extends Entity
{
	public $table = 'cc_leaves';
   	
    public $timestamps = false;

    public $object_name = "Leave";

    public $columns_list = [
        'Leave name'=>'leavename',
        'Leave type'=>'leave_type_id',
        'Start date'=>'start_date',
        'End date'=>'end_date',
        'Leave duration'=>'leave_duration',
        'Reason'=>'description',
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function leaveType(){
        return $this->hasOne(LeaveType::class,'id','leave_type_id');
    }
}


