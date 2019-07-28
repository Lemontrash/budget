<?php

namespace App\Http\Controllers;

use App\Category;
use App\CustomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function getAllCategories(){
        $categories = Category::all();
        $categories = ParsingController::parseCategoriesWithSubcategories($categories);
        // dd($categories);

        return response()->json(['success' => true, 'value' => $categories]);
    }


}
