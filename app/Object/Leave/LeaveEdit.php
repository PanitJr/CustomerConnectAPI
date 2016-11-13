<?php

namespace App\Object\Leave;
use App\CC\Loader;
use App\Object\CC\CCEdit as edit;

class LeaveEdit extends edit
{
    public function checkPermission($request)
    {
        $objectName = $request->route('objectName');
        $record = (int)$request->route('record');
        $objectClass =  Loader::getObject($objectName);
        $objectModel = $objectClass::find($record);

        $error_code = "ACCESS_DENIED";

        if(!$objectModel && !empty($record))
        {
            throw new ApiException($error_code, 'Record not found ! ');
        }

        if($objectModel && $objectModel->entity->deleted ==1)
        {
            throw new ApiException($error_code, 'The record you are trying to view has been deleted.');
        }
        return true;
    }

    public function process($request)
    {
        $objectName = $request->route('objectName');
        $record = (int)$request->route('record');

        $objectClass = 	Loader::getObject($objectName);
        if(empty($record))
        {
            $objectModel = new $objectClass();
        }
        else
        {
            $objectModel = $objectClass::find($record);
        }
        $label = $objectModel->getLabel();
        $layout = $this->convertLayout($objectModel);
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
        $objectModel->leaveType;
        return $objectModel;
    }
}