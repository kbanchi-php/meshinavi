<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'name' => 'Restaurant SPARTA',
                'name_kana' => 'レストラン スパルタ',
                'address' => '〒0287111 岩手県八幡平市大更35-62',
                'opentime' => 'lunch(11:00〜14:00) dinner(18:30〜22:00)',
                'holiday' => '不定休',
                'category' => '欧米・各国料理',
                'note' => '駐車場 30台 駅から徒歩30分 電子マネーは使用出来ません。',
                'pr_short' => '気のあう仲間たちと素敵な時間をすごしてください★',
                'pr_long' => '多国籍の人たちが集う素敵な空間になっています。期間限定プランもありますのでお気軽に起こしください♪',
            ],
            [
                'name' => 'Restaurant NEXT-REVOLUTION',
                'name_kana' => 'レストラン ネクストレボリューション',
                'address' => '〒0287111 岩手県八幡平市大更35-62',
                'opentime' => 'lunch(10:00〜15:00) dinner(17:30〜26:00)',
                'holiday' => '年中無休',
                'category' => 'カフェ・スイーツ',
                'note' => '駐車場 100台 駅から徒歩3分 電子マネーは使用出来ません。',
                'pr_short' => '休日の一時をゆっくりくつろいでください',
                'pr_long' => 'ゆったりとした時間がすぎる空間でくつろぎながら、スパルタを体感してください。',
            ],
        ]);
    }
}
