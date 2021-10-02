<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // カテゴリーテーブルにデータが入っていなかった場合に実行する。
        if (!DB::table('categories')->first()) {
            DB::table('categories')->insert([
                ['name' => '居酒屋'],
                ['name' => '日本料理・郷土料理'],
                ['name' => 'すし・魚料理・シーフード'],
                ['name' => '鍋'],
                ['name' => '焼肉・ホルモン'],
                ['name' => '焼き鳥・肉料理・串料理'],
                ['name' => '和食'],
                ['name' => 'お好み焼き・粉物'],
                ['name' => 'ラーメン・麺料理'],
                ['name' => '中華'],
                ['name' => 'イタリアン・フレンチ'],
                ['name' => '洋食'],
                ['name' => '欧米・各国料理'],
                ['name' => 'カレー'],
                ['name' => 'アジア・エスニック料理'],
                ['name' => 'オーガニック・創作料理'],
                ['name' => 'ダイニングバー・バー・ビアホール'],
                ['name' => 'お酒'],
                ['name' => 'カフェ・スイーツ'],
                ['name' => '宴会・カラオケ・エンターテイメント'],
                ['name' => 'ファミレス・ファーストフード'],
                ['name' => 'その他の料理'],
            ]);
        }
    }
}
