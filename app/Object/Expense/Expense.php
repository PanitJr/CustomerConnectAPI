<?php

namespace App\Object\Expense;

use App\Object\CC\Entity;
use App\Object\ExpenseStatus\ExpenseStatus;
use App\Object\Item\Item;

class Expense extends Entity
{
	public $table = 'cc_expenses';
   	
    public $timestamps = false;

    public $object_name = "Expense";

    public $columns_list = [
    	'Expense'=>'expensename',
        'Owner' => 'user_id',
        'Total Cost' => 'total_price',
        'Status' => 'status_id'
    ];


    public function item()
    {
        return $this->hasMany(Item::class,'expense id','id');
    }
    public function status()
    {
        return $this->hasOne(ExpenseStatus::class,'status_id','id');
    }
}


