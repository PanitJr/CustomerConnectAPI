<?php

namespace App\Object\Item;

use App\Object\CC\Entity;
use App\Object\Expense\Expense;

class Item extends Entity
{
	public $table = 'cc_items';
   	
    public $timestamps = false;

    public $object_name = "Item";

    public $columns_list = [
    	'Item'=>'itemname'

    ];

    public function expense()
    {
        return $this->hasMany(Expense::class,'id','expense id');
    }
}


