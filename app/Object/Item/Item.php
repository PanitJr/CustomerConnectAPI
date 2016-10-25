<?php

namespace App\Object\Item;

use App\Object\CC\Entity;

class Item extends Entity
{
	public $table = 'cc_items';
   	
    public $timestamps = false;

    public $object_name = "Item";

    public $columns_list = [
    	'Item Name'=>'itemname',
        'user'=>'userId',
        'category'=>'category_id',
        'opportunity'=>'opportunity_id',
        'cost'=>'cost',
        'description'=>'description',
        'create_at'=>'create_at',
        'update_at'=>'update_at',
        'attachment'=>'attachment',
        'status'=>'status'
    ];
}


