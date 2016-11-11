<?php

namespace App\Object\Item;

use App\Object\CC\CCDetail as detail;

class CCDetail extends detail
{
    public function convertData($objectModel)
    {
        $objectModel->travel;
        $objectModel->item_date = date("d-m-Y", strtotime($objectModel->item_date));
        return $objectModel;
    }
}
