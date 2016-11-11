<?php

namespace App\Object\BTSStation;

use App\Object\CC\Entity;

class BTSStation extends Entity
{
	public $table = 'cc_btsstations';
   	
    public $timestamps = false;

    public $object_name = "BTSStation";

    public $columns_list = [
    	'bts_station'=>'btsstation'
    ];
}


