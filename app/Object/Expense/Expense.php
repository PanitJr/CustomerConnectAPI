<?php

namespace App\Object\Expense;

use App\Object\CC\Entity;
use App\Object\ExpenseStatus\ExpenseStatus;
use App\Object\Item;

class Expense extends Entity
{
	public $table = 'cc_expenses';
   	
    public $timestamps = false;

    public $object_name = "Expense";

    public $columns_list = [
    	'Expense'=>'expensename',
        'Total Cost' => 'total_price',
        'Status' => 'status_id'
    ];
    public function item()
    {
        return $this->hasMany(Item\Item::class,'item_id','id');
    }
    public function status()
    {
        return $this->hasOne(ExpenseStatus::class,'status_id','id');
    }
}


