<?php

namespace App\Http\Controllers;

use App\Category;
use App\CustomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function getAllCategories(Request $request){
        $userId = Auth::id();

        $categories = Category::where('parentCategory', '')->get();
        $customCategories = CustomCategory::where('personal', 'no')->get();



    }
}
