<?php

namespace App\Object\Service;

use App\Object\CC\Entity;

class Service extends Entity
{
	public $table = 'cc_services';
   	
    public $timestamps = false;

    public $object_name = "Service";

    public $columns_list = [
    	'service_name'=>'servicename'
    ];
}


