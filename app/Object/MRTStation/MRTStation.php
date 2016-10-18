<?php

namespace App\Object\MRTStation;

use App\Object\CC\Entity;

class MRTStation extends Entity
{
	public $table = 'cc_mrtstations';
   	
    public $timestamps = false;

    public $object_name = "MRTStation";

    public $columns_list = [
    	'mrt_station'=>'mrtstation'
    ];
}


