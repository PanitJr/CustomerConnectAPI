<?php

namespace App\Object\AirPortRailLinkCost;

use App\Object\CC\Entity;

class AirPortRailLinkCost extends Entity
{
	public $table = 'cc_airportraillinkcosts';
   	
    public $timestamps = false;

    public $object_name = "AirPortRailLinkCost";

    public $columns_list = [
    	'airportraillink_cost'=>'airportraillinkcost'
    ];
}


