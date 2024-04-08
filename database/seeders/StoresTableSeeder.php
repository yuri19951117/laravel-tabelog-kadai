<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i += 1) {
            Store::create([
                'name' => '店舗名'. $i,
                'category_id' => $i%5 + 1,
                'img' => 'img/dummy.jpg',
                'description' => '説明'.$i,
                'lowest_price' => 1000,
                'highest_price' => 8000,
                'opening_time' => '16:00',
                'closing_time' => '22:00',
                'post_code' => '839-9353',
                'address' => '住所',
                'phone_number' => '09000000000',
                'holiday' => '月,火'
            ]);
            }
    }
}