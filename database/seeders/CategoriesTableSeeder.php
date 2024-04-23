<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $store_categories = [
                     '居酒屋', '焼肉', '寿司', 'ラーメン' ,'定食', 'カレー', '喫茶店' ,'中華料理', 'イタリア料理', 'フランス料理', '韓国料理'
                    ];

                    foreach ($store_categories as $store_category) {
                    Category::create([
                    'name' => $store_category,
                    'description' => $store_category,
                    ]);
                }
            
    
}
}