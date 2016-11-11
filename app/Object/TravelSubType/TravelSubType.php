<?php

namespace App\Object\TravelSubType;

use App\Object\CC\Entity;

class TravelSubType extends Entity
{
	public $table = 'cc_travelsubtypes';
   	
    public $timestamps = false;

    public $object_name = "TravelSubType";

    public $columns_list = [
    	'travel_sub_type_name'=>'travelsubtypename'
    ];
}


