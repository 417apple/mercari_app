<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;


class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::factory()->create([
            'id'               => 1,
            'name'             => 'トップス',
            'sort_no'          => 1,
            'main_category_id' => 1,
        ]);
        SubCategory::factory()->create([
            'id'               => 2,
            'name'             => 'ジャケット/アウター',
            'sort_no'          => 2,
            'main_category_id' => 1,
        ]);
        SubCategory::factory()->create([
            'id'                => 3,
             'name'             => 'パンツ',
             'sort_no'          => 3,
             'main_category_id' => 1,
        ]);
        SubCategory::factory()->create([
            'id'                => 4,
             'name'             => 'スカート',
             'sort_no'          => 4,
             'main_category_id' => 1,
        ]);
        SubCategory::factory()->create([
            'id'               => 5,
            'name'             => 'トップス',
            'sort_no'          => 5,
            'main_category_id' => 2,
        ]);
        SubCategory::factory()->create([
            'id'               => 6,
            'name'             => 'ジャケット/アウター',
            'sort_no'          => 6,
            'main_category_id' => 2,
        ]);
        SubCategory::factory()->create([
            'id'               => 7,
            'name'             => 'パンツ',
            'sort_no'          => 7,
            'main_category_id' => 2,
        ]);
        SubCategory::factory()->create([
            'id'               => 8,
            'name'             => '靴',
            'sort_no'          => 8,
            'main_category_id' => 2,
        ]);
        SubCategory::factory()->create([
            'id'               => 9,
            'name'             => 'ベビー服（男の子用）',
            'sort_no'          => 9,
            'main_category_id' => 3,
        ]);
        SubCategory::factory()->create([
            'id'               => 10,
            'name'             => 'ベビー服（女の子用）',
            'sort_no'          => 10,
            'main_category_id' => 3,
        ]);
        SubCategory::factory()->create([
            'id'               => 11,
            'name'             => 'キッズ服（男の子用）',
            'sort_no'          => 11,
            'main_category_id' => 3,
        ]);
        SubCategory::factory()->create([
            'id'               => 12,
            'name'             => 'キッズ服（女の子用）',
            'sort_no'          => 12,
            'main_category_id' => 3,
        ]);
        SubCategory::factory()->create([
            'id'               => 13,
            'name'             => 'その他',
            'sort_no'          => 13,
            'main_category_id' => 4,
        ]);
    }
}
