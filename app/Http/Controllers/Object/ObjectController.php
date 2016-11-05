<?php

namespace App\Http\Controllers\Object;

use File;
use App\CC\Loader;
use Illuminate\Http\Request;
use App\apiResponse;
use App\CC\Error\ApiException;

class ObjectController extends BaseObjectController
{
    public function object_home()
    {
        // $objectAll = \App\CC\ObjectBasic::whereIn("id" ,[4,5])->get();
        //$objectAll = \App\CC\ObjectBasic::all();
        $objectAll = [["id"=>1,"name"=>"Item","tablename"=>"cc_items","fieldname"=>"itemname"],
        ["id"=>2,"name"=>"Travel","tablename"=>"cc_travels","fieldname"=>"traveltypeid"],
        //["id"=>3,"name"=>"TravelType","tablename"=>"cc_traveltypes","fieldname"=>"traveltypename"],
        //["id"=>4,"name"=>"TravelSubType","tablename"=>"cc_travelsubtypes","fieldname"=>"travelsubtypename"],
        //["id"=>5,"name"=>"MRTCost","tablename"=>"cc_mrtcosts","fieldname"=>"mrtcost"],
        //["id"=>6,"name"=>"MRTStation","tablename"=>"cc_mrtstations","fieldname"=>"mrtstation"],
        //["id"=>7,"name"=>"BTSCost","tablename"=>"cc_btscosts","fieldname"=>"btscost"],
        //["id"=>8,"name"=>"BTSStation","tablename"=>"cc_btsstations","fieldname"=>"btsstation"],
        //["id"=>9,"name"=>"MRTStationCost","tablename"=>"cc_mrtstationcosts","fieldname"=>"mrtstationcost"],
        //["id"=>10,"name"=>"BTSStationCost","tablename"=>"cc_btsstationcosts","fieldname"=>"btsstationcost"],
        //["id"=>11,"name"=>"AirPortRailLinkCost","tablename"=>"cc_airportraillinkcosts","fieldname"=>"airportraillinkcost"],
        //["id"=>12,"name"=>"AirPortRailLinkStation","tablename"=>"cc_airportraillinkstations","fieldname"=>"airportraillinkstation"],
        //["id"=>13,"name"=>"AirPortRailLinkCostStation","tablename"=>"cc_airportraillinkcoststations","fieldname"=>"airportraillinkcoststation"],
        //["id"=>14,"name"=>"BRTCost","tablename"=>"cc_brtcosts","fieldname"=>"brtcostname"],
        //["id"=>15,"name"=>"BRTStation","tablename"=>"cc_brtstations","fieldname"=>"brtstationname"],
        //["id"=>16,"name"=>"BRTCostStation","tablename"=>"cc_brtcoststations","fieldname"=>"brtcoststationname"],
        //["id"=>17,"name"=>"TaxiAppType","tablename"=>"cc_taxiapptypes","fieldname"=>"taxiapptypename"],
        ["id"=>18,"name"=>"Service","tablename"=>"cc_services","fieldname"=>"servicename"],
        ["id"=>19,"name"=>"Other","tablename"=>"cc_others","fieldname"=>"othername"],
        ["id"=>20,"name"=>"Medical","tablename"=>"cc_medicals","fieldname"=>"medicalname"],
        //["id"=>21,"name"=>"Permission","tablename"=>"cc_permissions","fieldname"=>"permissionname"],
        //["id"=>22,"name"=>"ProfilePermission","tablename"=>"cc_profilepermissions","fieldname"=>"profilepermissionname"],
        //["id"=>23,"name"=>"UserStatus","tablename"=>"cc_userstatuss","fieldname"=>"userstatusname"],
        ["id"=>24,"name"=>"Expense","tablename"=>"cc_expenses","fieldname"=>"expensename"],
        //["id"=>25,"name"=>"Approval","tablename"=>"cc_approvals","fieldname"=>"approvalcomment"],
        //["id"=>26,"name"=>"ExpenseStatus","tablename"=>"cc_expensestatuss","fieldname"=>"expensestatusname"],
        //["id"=>27,"name"=>"ServiceType","tablename"=>"cc_servicetypes","fieldname"=>"servicetypename"],
        //["id"=>28,"name"=>"ItemCategory","tablename"=>"cc_itemcategorys","fieldname"=>"itemcategoryname"],
        //["id"=>29,"name"=>"ItemStatus","tablename"=>"cc_itemstatuss","fieldname"=>"itemstatusname"],
        //["id"=>30,"name"=>"TaxiApp","tablename"=>"cc_taxiapps","fieldname"=>"taxiapptypeid"],
        ["id"=>31,"name"=>"Leave","tablename"=>"cc_leaves","fieldname"=>"leavename"]];
        //["id"=>32,"name"=>"LeaveType","tablename"=>"cc_leavetypes","fieldname"=>"leavetypename"]];
        return apiResponse::success($objectAll); 
    }

    public static function getResult(Request $Request,$objectName,$processFile)
    {
//        var_dump($objectName);
//        var_dump($processFile);
//        exit;
        $className = Loader::getObjectClassName($processFile,$objectName); 
        $handler = new $className();
        return self::run($handler,$Request);  
    }
    
    public function create(Request $request) {
        $productEntity = new Object();
        $productEntity->input([
            "objectname" => $request->objectname,
        ]);
        $productEntity->make();

        $response = apiResponse::success([
            "object" => $productEntity,
        ]);

        return $response;
    }
}
