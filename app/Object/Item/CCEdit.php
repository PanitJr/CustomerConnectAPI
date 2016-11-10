<?php

namespace App\Object\Item;

use App\Object\CC\CCEdit as edit;

class CCEdit extends edit
{
    public function convertData($objectModel)
    {
        if($objectModel->category == "Travel"){$item->Travel;}
        else if($objectModel->category == "Service"){$item->Service;}
        else if($objectModel->category == "Other"){$item->Other;}
        else if($objectModel->category == "Medical"){$item->Medical;}
        $objectModel->Entity;
        $objectModel->item_date = date("d-m-Y",strtotime($item->item_date));
        return $objectModel;
    }
}