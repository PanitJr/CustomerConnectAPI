<?php

namespace App\Object\ItemStatus;

use App\Object\CC\Entity;

class ItemStatus extends Entity
{
	public $table = 'cc_itemstatuss';
   	
    public $timestamps = false;

    public $object_name = "ItemStatus";

    public $columns_list = [
    	'item_status_name'=>'itemstatusname'
    ];
}


