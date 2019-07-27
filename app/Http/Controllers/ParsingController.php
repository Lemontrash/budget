<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParsingController extends Controller
{
    public static function parseCategoriesWithSubcategories($items){
        foreach ($items as $item) {
            $data[]['id']           = $item->id;
            $data[]['name']         = $item->name;
            $data[]['icon']         = $item->icon;
            $data[]['created_at']   = $item->created_at->timestamp;
            $data[]['updated_at']   = $item->updated_at->timestamp;

            if(!empty($item->parentCategory)){
                $data[]['parentCategory'] = $item->parentCategory;
            }
        }
        return $data;
    }

    public static function parseCustomCategoriesWithSubcategories($items){
        foreach ($items as $item) {
            $data[]['id']           = $item->id;
            $data[]['name']         = $item->name;
            $data[]['icon']         = $item->icon;
            $data[]['owner']        = $item->owner;
            $data[]['personal']     = $item->personal;
            $data[]['created_at']   = $item->created_at->timestamp;
            $data[]['updated_at']   = $item->updated_at->timestamp;

            if(!empty($item->parentCategory)){
                $data[]['parentCategory'] = $item->parentCategory;
            }
        }
        return $data;
    }

    public static function parseUsers($items){
        foreach ($items as $item) {
            $data[]['id']                   = $item->id;
            $data[]['name']                 = $item->name;
            $data[]['email']                = $item->email;
            $data[]['phone']                = $item->phone;
            $data[]['remember_token']       = $item->remember_token;
            $data[]['created_at']           = $item->created_at->timestamp;
            $data[]['updated_at']           = $item->updated_at->timestamp;
        }
        return $data;
    }

    public static function parseActivities($items){
        foreach ($items as $item) {
            $data[]['id']               = $item->id;
            $data[]['categoryId']       = $item->categoryId;
            $data[]['activityName']     = $item->activityName;
            $data[]['userId']           = $item->userId;
            $data[]['amount_of_money']  = $item->amount_of_money;
            $data[]['currency']         = $item->currency;
            $data[]['created_at']       = $item->created_at->timestamp;
            $data[]['updated_at']       = $item->updated_at->timestamp;
        }
        return $data;
    }
}
