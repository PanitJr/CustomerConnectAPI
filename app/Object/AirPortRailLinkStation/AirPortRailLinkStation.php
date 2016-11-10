<?php

namespace App\Object\AirPortRailLinkStation;

use App\Object\CC\Entity;

class AirPortRailLinkStation extends Entity
{
	public $table = 'cc_airportraillinkstations';
   	
    public $timestamps = false;

    public $object_name = "AirPortRailLinkStation";

    public $columns_list = [
    	'airportraillink_station'=>'airportraillinkstation',
        'airportlinkstationcode'=>'airportlinkstationcode'
    ];
}


