<?php

namespace App\Object\Travel;

use App\CC\Loader;
use App\Object\CC\CCSave as Save ;
class CCSave extends save
{
    public function checkPermission($request)
    {
        return true;
    }

    public function process($request)
    {
//        save::process($request);
        $objectName = 'Travel';
        $record = (int)$request->route('record');
        $objectClass = 	Loader::getObject($objectName);
        $objectItemClass = Loader::getObject('Item');
        $itemRecord =(int)$request->get('item.id');
        if(empty($itemRecord))
        {
            $objectItem = new $objectItemClass();
        }
        else
        {
            $objectItem = $objectItemClass::find($itemRecord);
        }
//        $objectItem->itemname = $request->get('item.itemname');
//        $objectItem->category = $request->get('item.category');
//        $objectItem->opportunity = $request->get('item.opportunity');
//        $objectItem->cost = $request->get('item.cost');
//        $objectItem->item_date = $request->get('item.item_date');
        //$objectItem->save();

        if(empty($record))
        {
            $objectModel = new $objectClass();
        }
        else
        {
            $objectModel = $objectClass::find($record);
        }
        //$objectModel->item_id = $objectItem->get('id');
        return $this->saveValue($request,$objectModel);
    }
    public function saveValue($request,$objectModel)
    {
        $this->before_save($request,$objectModel);

        $objectModel->save();

        $updateModel = $objectModel->find($objectModel->id);
        if($updateModel)
        {
            $this->after_save($request,$updateModel);
            $objectModel = $updateModel;
        }


        return $objectModel;
    }
    public function before_save($request,$objectModel)
    {
        $Object = $objectModel->getObject();
        foreach ($Object->getField as $field) {
            $fieldValue = $request->get($field->fieldname);
            if(!is_null($fieldValue))
            {
                $objectModel->{$field->fieldname} = $fieldValue;
            }
        }
    }
    public function after_save($request,$objectModel)
    {
        $Object = $objectModel->getObject();
        foreach ($Object->getField as $field) {
            $fieldValue = $this->coverdataAfterSave($request,$field,$objectModel);
            if(!is_null($fieldValue))
            {
                $objectModel->{$field->fieldname} = $fieldValue;
            }
        }
        $objectModel->save();
    }
    public function coverdataAfterSave($request , $field , $objectModel)
    {
        $response = null;
        switch ($field->get_fieldType()) {
            case 'image':
                $response = $this->imageUpload($request,$field->fieldname,$objectModel);
                break;
        }
        return $response;
    }

    public function imageUpload($request,$name,$objectModel)
    {
        $response = null;
        $pathName = sprintf("object_image/%s/%s/",class_basename($objectModel),$objectModel->id);
        $filePath = $request->get($name,null);
        if ($request->hasFile($name)) {
            $image = $request->file($name);
            $filename  = $name . '.png';
            $response = $this->fileUpload($request,$name,$filename,$pathName);
            $response .= sprintf("?%s",md5($image));
        }
        else if(empty($filePath))
        {
            $response = "";
        }
        return $response;
    }

    public function fileUpload($request,$name,$filename,$pathName)
    {
        $response = null;
        if ($request->hasFile($name)) {
            $file = $request->file($name);
            $file->move(public_path($pathName),$filename);
            $response = asset($pathName.$filename);
        }

        return $response;

    }
}
