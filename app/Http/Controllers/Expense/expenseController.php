<?php
/**
 * Created by IntelliJ IDEA.
 * User: Eieigrm
 * Date: 31/10/2559
 * Time: 0:47
 */

namespace App\Http\Controllers\Expense;


use App\Http\Controllers\Controller;
use App\apiResponse;
use App\Http\Requests;

class expenseController extends Controller
{

    public function submitted_List(){

            $objectAll['heads'] = ["Expense Name","Owner","Total Price","Status"];
            $objectAll['total'] = \App\Object\Expense\Expense::count();
            $objectAll['object'] = \App\Object\Expense\Expense::where('status_id',0)->get();
            //  $objectAll = \App\Object\Expense\Expense::all();
            return apiResponse::success($objectAll);
    }

    public function approved_List(){
        $objectAll2['heads'] = ["Expense Name","Owner","Total Price","Status"];
        $objectAll2['total'] = \App\Object\Expense\Expense::count();
        $objectAll2['object'] = \App\Object\Expense\Expense::where('status_id',1)->get();
        //  $objectAll = \App\Object\Expense\Expense::all();
        return apiResponse::success($objectAll2);
    }

    public function rejected_List(){
        $objectAll3['heads'] = ["Expense Name","Owner","Total Price","Status"];
        $objectAll3['total'] = \App\Object\Expense\Expense::count();
        $objectAll3['object'] = \App\Object\Expense\Expense::where('status_id',2)->get();
        //  $objectAll = \App\Object\Expense\Expense::all();
        return apiResponse::success($objectAll3);
    }

    public function paid_List(){
        $objectAll4['heads'] = ["Expense Name","Owner","Total Price","Status"];
        $objectAll4['total'] = \App\Object\Expense\Expense::count();
        $objectAll4['object'] = \App\Object\Expense\Expense::where('status_id',3)->get();
        //  $objectAll = \App\Object\Expense\Expense::all();
        return apiResponse::success($objectAll4);
    }
}

