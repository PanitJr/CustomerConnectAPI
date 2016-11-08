<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 6/11/2559
 * Time: 19:52
 */

namespace App\Object\Item;

use App\Object\Expense\Expense;
use App\User;

class Submit
{
    public function checkPermission($request)
    {
        return true;
    }

    public function process($request)
    {
        $user = User::All();
        foreach ($user as $u) {
            $listModel = DB::table('cc_items')
                ->join('entitys','cc_items.id','=','entitys.id')
                ->join('users','users.id','=',$u->id)
                ->get();
            foreach ($listModel as $item) {
                $item->status = 1;

                $item->save();
            }
        }
    }
}