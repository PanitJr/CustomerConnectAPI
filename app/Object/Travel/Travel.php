<?php

namespace App\Object\Travel;

use App\Object\CC\Entity;

class Travel extends Entity
{
	public $table = 'cc_travels';
   	
    public $timestamps = false;

    public $object_name = "Travel";

    public $columns_list = [
    	'travel_type_id'=>'traveltypeid'
    ];
}


