<?php

namespace App\Object\TaxiApp;

use App\Object\CC\Entity;

class TaxiApp extends Entity
{
	public $table = 'cc_taxiapps';
   	
    public $timestamps = false;

    public $object_name = "TaxiApp";

    public $columns_list = [
    	'taxi_app_type_id'=>'taxiapptypeid'
    ];
}


