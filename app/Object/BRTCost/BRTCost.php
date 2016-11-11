<?php

namespace App\Object\BRTCost;

use App\Object\CC\Entity;

class BRTCost extends Entity
{
	public $table = 'cc_brtcosts';
   	
    public $timestamps = false;

    public $object_name = "BRTCost";

    public $columns_list = [
    	'brt_cost_name'=>'brtcostname'
    ];
}


