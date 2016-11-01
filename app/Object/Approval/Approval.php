<?php

namespace App\Object\Approval;

use App\Object\CC\Entity;
class Approval extends Entity
{
	public $table = 'cc_approvals';
   	
    public $timestamps = false;

    public $object_name = "Approval";

    public $columns_list = [
    	'approval_comment'=>'approvalcomment'
    ];
}


