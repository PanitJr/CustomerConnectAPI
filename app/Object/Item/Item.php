<?php

namespace App\Object\Item;

use App\Object\CC\Entity;
use App\Object\Expense\Expense;
use App\Object\Travel\Travel;
use App\Object\Service\Service;
use App\Object\Other\Other;
use App\Object\Medical\Medical;

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
    public function Travel(){
        return $this->hasOne(Travel::class,'item_id','id');
    }
    public function Service(){
        return $this->hasOne(Service::class,'item_id','id');
    }
    public function Other(){
        return $this->hasOne(Other::class,'item_id','id');
    }
    public function Medical(){
        return $this->hasOne(Medical::class,'item_id','id');
    }
    public function Expense(){
        return $this->hasOne(Expense::class,'id','expense_id');
    }

}


