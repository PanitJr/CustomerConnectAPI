<?php

namespace App\Object\Item;
use App\Object\CC;
use App\Object\CC\CCDetail as detail;

class CCDetail extends detail
{
    public function convertData($objectModel)
    {
        $objectModel->travel;
        $objectModel->Entity;
        return $objectModel;
    }
}
