<?php

namespace App\Object\Item;

use App\Object\CC\Entity;
use App\Object\Expense\Expense;
use App\User;

class Item extends Entity
{
	public $table = 'cc_items';
   	
    public $timestamps = false;

    public $object_name = "Item";

    public $columns_list = [
    	'Item'=>'itemname',
        'Owner'=>'userId',
        'Cost'=>'cost',
        'Status'=>'status_id'


    ];

    public function expense()
    {
        return $this->hasMany(Expense::class,'id','expense id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','userId');
    }
}


