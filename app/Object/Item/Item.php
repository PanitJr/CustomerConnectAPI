<?php

namespace App\Object\Item;

use App\Object\CC\Entity;
use App\Object\Travel\Travel;

class Item extends Entity
{
	public $table = 'cc_items';
   	
    public $timestamps = false;

    public $object_name = "Item";

    public $columns_list = [
    	'Item Name'=>'itemname',
        'category'=>'category',
        'opportunity'=>'opportunity',
        'cost'=>'cost',
        'description'=>'description',
        'attachment'=>'attachment',
        'status'=>'status',
        'date'=>'item_date'
    ];
    public function travel(){
        return $this->hasOne(Travel::class,'item_id','id');
    }
    public function service(){
        return $this->hasOne(Service::class,'item_id','id');
    }
    public function Other(){
        return $this->hasOne(Travel::class,'item_id','id');
    }
    public function medical(){
        return $this->hasOne(Travel::class,'item_id','id');
    }

}


