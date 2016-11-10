<?php

namespace App\Object\Item;
use App\Object\CC;
use App\Object\CC\CCDetail as detail;

class CCDetail extends detail
{
    public function convertData($objectModel)
    {
        if($objectModel->category == "Travel"){$objectModel->Travel;}
        else if($objectModel->category == "Service"){$objectModel->Service;}
        else if($objectModel->category == "Other"){$objectModel->Other;}
        else if($objectModel->category == "Medical"){$objectModel->Medical;}
        $objectModel->Entity;
        $objectModel->item_date = date("d-m-Y",strtotime($objectModel->item_date));
        return $objectModel;
    }
}
