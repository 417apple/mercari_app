<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    // 出品中
    const STATE_SELLING = 'selling';
    // 購入済み
    const STATE_BOUGHT = 'bought';

    public function getIsStateSellingAttribute()
    {
        return $this->state === self::STATE_SELLING;
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function getIsStateBoughtAttribute()
     {
         return $this->state === self::STATE_BOUGHT;
     }

}
