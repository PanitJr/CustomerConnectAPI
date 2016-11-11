<?php

namespace App\Object\Travel;

use App\Object\CC\CCEdit as Edit ;


class CCEdit extends Edit
{
    public function convertData($objectModel)
    {
        $objectModel->item;
        return $objectModel;
    }
}