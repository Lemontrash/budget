<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParsingController extends Controller
{
    public static function parseCategoriesWithSubcategories($items){
        foreach ($items as  $key => $item) {
            $data[$key]['id']           = $item->id;
            $data[$key]['name']         = $item->name;
            $data[$key]['icon']         = $item->icon;
            $data[$key]['created_at']   = $item->created_at->timestamp;
            $data[$key]['updated_at']   = $item->updated_at->timestamp;

            if(!empty($item->parentCategory)){
                $data[$key]['parentCategory'] = $item->parentCategory;
            }
        }
        return $data;
    }

    public static function parseCustomCategoriesWithSubcategories($items){
        foreach ($items as $key => $item) {
            $data[$key]['id']           = $item->id;
            $data[$key]['name']         = $item->name;
            $data[$key]['icon']         = $item->icon;
            $data[$key]['owner']        = $item->owner;
            $data[$key]['personal']     = $item->personal;
            $data[$key]['created_at']   = $item->created_at->timestamp;
            $data[$key]['updated_at']   = $item->updated_at->timestamp;

            if(!empty($item->parentCategory)){
                $data[]['parentCategory'] = $item->parentCategory;
            }
        }
        return $data;
    }

    public static function parseUsers($items){
        foreach ($items as $key => $item) {
            $data[$key]['id']                   = $item->id;
            $data[$key]['name']                 = $item->name;
            $data[$key]['email']                = $item->email;
            $data[$key]['phone']                = $item->phone;
            $data[$key]['remember_token']       = $item->remember_token;
            $data[$key]['created_at']           = $item->created_at->timestamp;
            $data[$key]['updated_at']           = $item->updated_at->timestamp;
        }
        return $data;
    }

    public static function parseActivities($items){
        foreach ($items as $key => $item) {
            $data[$key]['id']               = $item->id;
            $data[$key]['categoryId']       = $item->categoryId;
            $data[$key]['activityName']     = $item->activityName;
            $data[$key]['userId']           = $item->userId;
            $data[$key]['amount_of_money']  = $item->amount_of_money;
            $data[$key]['currency']         = $item->currency;
            $data[$key]['created_at']       = $item->created_at->timestamp;
            $data[$key]['updated_at']       = $item->updated_at->timestamp;
        }
        return $data;
    }
}
