<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 6/11/2559
 * Time: 19:52
 */

namespace App\Object\Item;
use App\CC\Loader;
use App\Object\CC\CCSave as save;

class Submit extends save
{
    public function checkPermission($request)
    {
        return true;
    }

    public function process($request)
    {
        $record = (int)$request->route('record');
        $objectClassItem = 	Loader::getObject('Item');
        $objectModelItem = $objectClassItem::find($record);

        if($request->get('expense_id') == null){
            $objectClassExpense = Loader::getObject('Expense');
            $objectModelExpense = new $objectClassExpense();
            $objectModelExpense->expensename = $request->get('opportunity')."-".$request->get('item_date');
            $objectModelExpense->save();

                $objectModelItem->expense_id = $objectModelExpense->id;
                $objectModelItem->save();
        }
        return $objectModelItem;
    }
}