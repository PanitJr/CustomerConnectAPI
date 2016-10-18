<?php

namespace App\Object\ServiceType;

use App\Object\CC\Entity;

class ServiceType extends Entity
{
	public $table = 'cc_servicetypes';
   	
    public $timestamps = false;

    public $object_name = "ServiceType";

    public $columns_list = [
    	'service_type_name'=>'servicetypename'
    ];
}


