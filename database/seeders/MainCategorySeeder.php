<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MainCategory;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainCategory::factory()->create([
            'id'      => 1,
            'name'    => 'レディース',
            'sort_no' => 1,
        ]);
        MainCategory::factory()->create([
            'id'      => 2,
            'name'    => 'メンズ',
            'sort_no' => 2,
        ]);
        MainCategory::factory()->create([
            'id'      => 3,
            'name'    => 'ベビー・キッズ',
            'sort_no' => 3,
        ]);
        MainCategory::factory()->create([
            'id'      => 4,
            'name'    => 'その他',
            'sort_no' => 4,
        ]);
    }
}
