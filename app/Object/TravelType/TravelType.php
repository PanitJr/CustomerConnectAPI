<?php

namespace App\Object\TravelType;

use App\Object\CC\Entity;

class TravelType extends Entity
{
	public $table = 'cc_traveltypes';
   	
    public $timestamps = false;

    public $object_name = "TravelType";

    public $columns_list = [
    	'travel_type_name'=>'traveltypename'
    ];
}


