<?php

namespace App\Object\BTSCost;

use App\Object\CC\Entity;

class BTSCost extends Entity
{
	public $table = 'cc_btscosts';
   	
    public $timestamps = false;

    public $object_name = "BTSCost";

    public $columns_list = [
    	'bts_cost'=>'btscost'
    ];
}


