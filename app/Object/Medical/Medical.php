<?php

namespace App\Object\Medical;

use App\Object\CC\Entity;
use App\Object\Item\Item;

class Medical extends Entity
{
	public $table = 'cc_medicals';
   	
    public $timestamps = false;

    public $object_name = "Medical";

    public $columns_list = [
    	'medical_name'=>'medicalname'
    ];
    public function item(){
        return $this->hasOne(Item::class,'id','item_id');
    }
}


