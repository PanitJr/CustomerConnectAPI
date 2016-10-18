<?php

namespace App\Object\AirPortRailLinkCostStation;

use App\Object\CC\Entity;

class AirPortRailLinkCostStation extends Entity
{
	public $table = 'cc_airportraillinkcoststations';
   	
    public $timestamps = false;

    public $object_name = "AirPortRailLinkCostStation";

    public $columns_list = [
    	'airportraillink_cost_station'=>'airportraillinkcoststation'
    ];
}


