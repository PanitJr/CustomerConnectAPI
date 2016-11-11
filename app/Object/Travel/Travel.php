<?php

namespace App\Object\Travel;

use App\Object\CC\Entity;
use App\Object\Item\Item;

class Travel extends Entity
{
	public $table = 'cc_travels';
   	
    public $timestamps = false;

    public $object_name = "Travel";

    public $columns_list = [
        'Travel Type'=>'travel_type',
        'Travel Sub Type'=>'travel_sub_type',
        'Origination'=>'origination',
        'Destination'=>'destination',
        'Estimate Cost'=>'estimate_cost'
    ];
    public function item(){
        return $this->hasOne(Item::class,'id','item_id');
    }
}



