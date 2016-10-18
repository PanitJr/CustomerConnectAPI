<?php

namespace App\Object\Item;

use App\Object\CC\Entity;

class Item extends Entity
{
	public $table = 'cc_items';
   	
    public $timestamps = false;

    public $object_name = "Item";

    public $columns_list = [
    	'Item Name'=>'itemname'
    ];
}


