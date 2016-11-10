<?php

namespace App\Object\Travel;


use App\Object\CC\CCSave as Save ;
class CCSave extends save
{
    public function checkPermission($request)
    {
        return true;
    }

    public function process($request)
    {
        $model = parent::process($request);
//        $itemData = $request->get('item');
//        $itemObj = $model->item;
//        $itemObj->itemname = $itemData['itemname'];
//        $itemObj->category = $itemData['category'];
//        $itemObj->opportunity = $itemData['opportunity'];
//        $itemObj->cost = $itemData['cost'];
//        $itemObj->attachment = $itemData['attachment'];
//        $itemObj->status = $itemData['status'];
//        $itemObj->item_date = $itemData['item_date'];
//        $itemObj->save();
//        $model->set('item_id',$itemObj->get('id'));
//        $model->save();
//
        return $model;
    }

}
