<?php

namespace App\Object\TaxiAppType;

use App\Object\CC\Entity;

class TaxiAppType extends Entity
{
	public $table = 'cc_taxiapptypes';
   	
    public $timestamps = false;

    public $object_name = "TaxiAppType";

    public $columns_list = [
    	'taxi_app_type_name'=>'taxiapptypename'
    ];
}


