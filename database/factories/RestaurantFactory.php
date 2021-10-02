<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word();
        $holiday = ['不定休', '月曜定休', '年中無休'];
        $category = [
            '居酒屋', '日本料理・郷土料理', 'すし・魚料理・シーフード', '鍋', '焼肉・ホルモン', '焼き鳥・肉料理・串料理',
            '和食', 'お好み焼き・粉物', 'ラーメン・麺料理', '中華', 'イタリアン・フレンチ', '洋食', '欧米・各国料理',
            'カレー', 'アジア・エスニック料理', 'オーガニック・創作料理', 'ダイニングバー・バー・ビアホール', 'お酒',
            'カフェ・スイーツ', '宴会・カラオケ・エンターテイメント', 'ファミレス・ファーストフード', 'その他の料理'
        ];

        return [
            'name' => $name,
            'name_kana' => $name,
            'address' => $this->faker->address(),
            'opentime' => 'lunch(11:00〜14:00) dinner(18:30〜22:00)',
            'holiday' => '不定休',
            'category' => $category[array_rand($category)],
            'note' => '駐車場 ' . rand(1, 30) . '台 駅から徒歩' . rand(1, 30) . '分 電子マネーは使用出来ません。',
            'pr_short' => '気のあう仲間たちと素敵な時間をすごしてください★',
            'pr_long' => '多国籍の人たちが集う素敵な空間になっています。期間限定プランもありますのでお気軽に起こしください♪',
            'img_path' => 'storage/restaurant_image/' . rand(1, 17) . '.jpg',
            'latitude' => $this->faker->latitude($min = 39.3956, $max = 39.4845),
            'longitude' => $this->faker->longitude($min = 141.0915, $max = 141.0916),
        ];
    }
}
