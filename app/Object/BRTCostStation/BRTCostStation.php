<?php

namespace App\Object\BRTCostStation;

use App\Object\CC\Entity;

class BRTCostStation extends Entity
{
	public $table = 'cc_brtcoststations';
   	
    public $timestamps = false;

    public $object_name = "BRTCostStation";

    public $columns_list = [
    	'brt_cost_station_name'=>'brtcoststationname'
    ];
}


