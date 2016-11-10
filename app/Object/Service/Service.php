<?php

namespace App\Object\Service;

use App\Object\CC\Entity;
use App\Object\Item\Item;

class Service extends Entity
{
	public $table = 'cc_services';
   	
    public $timestamps = false;

    public $object_name = "Service";

    public $columns_list = [
    	'service_name'=>'servicename'
    ];
    public function item(){
        return $this->hasOne(Item::class,'id','item_id');
    }
}


