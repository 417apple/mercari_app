<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function showItems(Request $request)
     {
         $items = Item::orderBy('id', 'DESC')->paginate(52);
         return view('items.items')
             ->with('items', $items);
     }
}
