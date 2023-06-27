<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\ItemCondition;

class SellController extends Controller
{
    public function showSellForm()
     {
        $categories = MainCategory::orderBy('sort_no')->get();
        $conditions = ItemCondition::orderBy('sort_no')->get();
        return view('sell', compact('categories', 'conditions'));
     }
}
