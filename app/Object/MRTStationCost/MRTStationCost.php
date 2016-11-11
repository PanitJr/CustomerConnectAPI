<?php

namespace App\Object\MRTStationCost;

use App\Object\CC\Entity;

class MRTStationCost extends Entity
{
	public $table = 'cc_mrtstationcosts';
   	
    public $timestamps = false;

    public $object_name = "MRTStationCost";

    public $columns_list = [
    	'mrt_station_cost'=>'mrtstationcost'
    ];
}


