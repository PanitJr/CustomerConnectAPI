<?php

namespace App\Object\Item;

use App\Object\CC\CCList as detail;

class CCList extends detail
{
    public function process($request)
    {
        $result = parent::process($request);
        foreach ($result['listInfo'] as $item){
            if($item->category == "Travel"){$item->Travel;}
            else if($item->category == "Service"){$item->Service;}
            else if($item->category == "Other"){$item->Other;}
            else if($item->category == "Medical"){$item->Medical;}
            $item->Entity;
            $item->item_date = date("d-m-Y",strtotime($item->item_date));
        }
        return $result;

    }
}
