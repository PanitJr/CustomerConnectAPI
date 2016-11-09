<?php

namespace App\Object\CC;

use App\CC\Loader;
use App\Object\CC\CCDetail as detail;

class ItemDetail extends detail
{
    public function checkPermission($request)
    {
        return true;
    }

    public function process($request)
    {   
        $objectName = $request->route('objectName');
        $record = (int)$request->route('record');
        $objectClass =  Loader::getObject($objectName);
        $objectModel = $objectClass::find($record);
        $label = $objectModel->getLabel();
        $layout =$this->convertLayout($objectModel);
        $data = $this->convertData($objectModel);
              
        return [
                "objectname"=>$objectName,
                "record"=>$record,
                "label"=>$label,
                "blocks"=>$layout,
                "data"=>$data
            ]; 
    }

    public function convertLayout($objectModel)
    {
    	$layout = [];
    	$Object = $objectModel->getObject();
    	$Blocks = $Object->getBlock()->orderby('sequence')->get();
    	foreach ($Blocks as $Block) {
			$Fields = $Block->getField()->orderby('sequence')->get();
			$Block->fields = $Fields;
    	}
    	return $Blocks;
    }

    public function convertData($objectModel)
    {
        $objectModel->user;
        return $objectModel;
    }
}
