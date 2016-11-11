<?php

namespace App\Object\Item;

use App\Object\CC\CCEdit as edit;

class CCEdit extends edit
{
    public function convertData($objectModel)
    {
        $objectModel->travel;
        return $objectModel;
    }
}