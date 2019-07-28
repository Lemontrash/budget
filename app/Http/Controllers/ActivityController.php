<?php

namespace App\Http\Controllers;

use App\CategoryActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{

    private $currencies = ['USD', 'EUR', 'GBP', 'UAH', 'RUB'];

    public function getAllActivities(){
        $activities = CategoryActivity::where('userId', Auth::id())->get();
        if ($activities->isEmpty()){
            return response()->json(['success' => false, 'No activities']);
        }
        $activities = ParsingController::parseActivities($activities);
        return response()->json($activities);
    }


    public function addActivity(Request $request){

        $categoryId = $request->get('categoryId');
        dd(Auth::id());
        $name = $request->get('name');
        $money = $request->get('money');
        $currency = $request->get('currency');
        if (!in_array($currency, $this->currencies)){
            return response()->json(['success' => false, 'message' => 'Wrong currency']);
        }
        CategoryActivity::create([
            'category_id' => $categoryId,
            'activity_name' => $name,
            'amount_of_money' => $money,
            'currency' => $currency,
            'userId' => Auth::id()
        ]);
        return response()->json(['success' => true]);
    }
}
