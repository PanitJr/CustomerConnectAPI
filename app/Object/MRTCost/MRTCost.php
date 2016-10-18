<?php

namespace App\Object\MRTCost;

use App\Object\CC\Entity;

class MRTCost extends Entity
{
	public $table = 'cc_mrtcosts';
   	
    public $timestamps = false;

    public $object_name = "MRTCost";

    public $columns_list = [
    	'mrt_cost'=>'mrtcost'
    ];
}


