<?php

namespace App\Object\BTSStationCost;

use App\Object\CC\Entity;

class BTSStationCost extends Entity
{
	public $table = 'cc_btsstationcosts';
   	
    public $timestamps = false;

    public $object_name = "BTSStationCost";

    public $columns_list = [
    	'bts_station_cost'=>'btsstationcost'
    ];
}


