<?php

namespace App\Http\Controllers;
use App\Http\Requests\SellRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\ItemCondition;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    public function showSellForm()
     {
        $categories = MainCategory::query()
        ->with([
            'subCategories' => function ($query) {
                $query->orderBy('sort_no');
            }
        ])
        ->orderBy('sort_no')
        ->get();

        $conditions = ItemCondition::orderBy('sort_no')->get();
        return view('sell', compact('categories', 'conditions'));
     }

     public function sellItem(SellRequest $request)
     {
         $user = Auth::user();
         $item                        = new Item();
         $item->seller_id             = $user->id;
         $item->name                  = $request->input('name');
         $item->description           = $request->input('description');
         $item->sub_category_id       = $request->input('category');
         $item->item_condition_id     = $request->input('condition');
         $item->price                 = $request->input('price');
         $item->state                 = Item::STATE_SELLING;
         $item->save();

         return redirect()->back()
             ->with('status', '商品を出品しました。');
     }
}
