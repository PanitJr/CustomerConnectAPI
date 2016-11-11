<?php

namespace App\Object\ItemCategory;

use App\Object\CC\Entity;

class ItemCategory extends Entity
{
	public $table = 'cc_itemcategorys';
   	
    public $timestamps = false;

    public $object_name = "ItemCategory";

    public $columns_list = [
    	'Item Category Name'=>'itemcategoryname'
    ];
}


