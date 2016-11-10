<?php

namespace App\Object\BRTStation;

use App\Object\CC\Entity;

class BRTStation extends Entity
{
	public $table = 'cc_brtstations';
   	
    public $timestamps = false;

    public $object_name = "BRTStation";

    public $columns_list = [
    	'brt_station_name'=>'brtstationname',
        'brtstationcode'=>'brtstationcode'
    ];
}


