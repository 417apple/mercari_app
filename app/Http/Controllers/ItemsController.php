<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function showItems(Request $request)
     {
        $query = Item::query();

        // カテゴリで絞り込み
        if ($request->filled('category')) {
            list($categoryType, $categoryID) = explode(':', $request->input('category'));

            if ($categoryType === 'main') {
                $query->whereHas('subCategory', function ($query) use ($categoryID) {
                    $query->where('main_category_id', $categoryID);
                });
            } else if ($categoryType === 'sub') {
                $query->where('sub_category_id', $categoryID);
            }
        }

         // キーワードで絞り込み
         if ($request->filled('keyword')) {
            $keyword = '%' . $this->escape($request->input('keyword')) . '%';
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', $keyword);
                $query->orWhere('description', 'LIKE', $keyword);
            });
        }

        $items = $query->orderBy('id', 'DESC')->paginate(52);

        return view('items.items')->with('items', $items);

     }

     private function escape(string $value)
     {
         return str_replace(
             ['\\', '%', '_'],
             ['\\\\', '\\%', '\\_'],
             $value
         );
     }

     public function showItemDetail(Item $item)
     {
         return view('items.item_detail')
             ->with('item', $item);
     }
}
