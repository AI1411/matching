<?php

use Illuminate\Database\Seeder;

class PrefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('prefs')->delete();
        \DB::table('prefs')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => '北海道',
                    'region_id' => 1,
                    'slug' => 'hokkaido',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => '青森県',
                    'region_id' => 1,
                    'slug' => 'aomori',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => '岩手県',
                    'region_id' => 1,
                    'slug' => 'iwate',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => '宮城県',
                    'region_id' => 1,
                    'slug' => 'miyagi',
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => '秋田県',
                    'region_id' => 1,
                    'slug' => 'akita',
                ),
            5 =>
                array(
                    'id' => 6,
                    'name' => '山形県',
                    'region_id' => 1,
                    'slug' => 'yamagata',
                ),
            6 =>
                array(
                    'id' => 7,
                    'name' => '福島県',
                    'region_id' => 1,
                    'slug' => 'fukushima',
                ),
            7 =>
                array(
                    'id' => 8,
                    'name' => '茨城県',
                    'region_id' => 2,
                    'slug' => 'ibaraki',
                ),
            8 =>
                array(
                    'id' => 9,
                    'name' => '栃木県',
                    'region_id' => 2,
                    'slug' => 'tochigi',
                ),
            9 =>
                array(
                    'id' => 10,
                    'name' => '群馬県',
                    'region_id' => 2,
                    'slug' => 'gunma',
                ),
            10 =>
                array(
                    'id' => 11,
                    'name' => '埼玉県',
                    'region_id' => 2,
                    'slug' => 'saitama',
                ),
            11 =>
                array(
                    'id' => 12,
                    'name' => '千葉県',
                    'region_id' => 2,
                    'slug' => 'chiba',
                ),
            12 =>
                array(
                    'id' => 13,
                    'name' => '東京都',
                    'region_id' => 2,
                    'slug' => 'tokyo',
                ),
            13 =>
                array(
                    'id' => 14,
                    'name' => '神奈川県',
                    'region_id' => 2,
                    'slug' => 'kanagawa',
                ),
            14 =>
                array(
                    'id' => 15,
                    'name' => '新潟県',
                    'region_id' => 5,
                    'slug' => 'niigata',
                ),
            15 =>
                array(
                    'id' => 16,
                    'name' => '富山県',
                    'region_id' => 5,
                    'slug' => 'toyama',
                ),
            16 =>
                array(
                    'id' => 17,
                    'name' => '石川県',
                    'region_id' => 5,
                    'slug' => 'ishikawa',
                ),
            17 =>
                array(
                    'id' => 18,
                    'name' => '福井県',
                    'region_id' => 5,
                    'slug' => 'fukui',
                ),
            18 =>
                array(
                    'id' => 19,
                    'name' => '山梨県',
                    'region_id' => 5,
                    'slug' => 'yamanashi',
                ),
            19 =>
                array(
                    'id' => 20,
                    'name' => '長野県',
                    'region_id' => 5,
                    'slug' => 'nagano',
                ),
            20 =>
                array(
                    'id' => 21,
                    'name' => '岐阜県',
                    'region_id' => 3,
                    'slug' => 'gifu',
                ),
            21 =>
                array(
                    'id' => 22,
                    'name' => '静岡県',
                    'region_id' => 3,
                    'slug' => 'shizuoka',
                ),
            22 =>
                array(
                    'id' => 23,
                    'name' => '愛知県',
                    'region_id' => 3,
                    'slug' => 'aichi',
                ),
            23 =>
                array(
                    'id' => 24,
                    'name' => '三重県',
                    'region_id' => 3,
                    'slug' => 'mie',
                ),
            24 =>
                array(
                    'id' => 25,
                    'name' => '滋賀県',
                    'region_id' => 4,
                    'slug' => 'shiga',
                ),
            25 =>
                array(
                    'id' => 26,
                    'name' => '京都府',
                    'region_id' => 4,
                    'slug' => 'kyoto',
                ),
            26 =>
                array(
                    'id' => 27,
                    'name' => '大阪府',
                    'region_id' => 4,
                    'slug' => 'osaka',
                ),
            27 =>
                array(
                    'id' => 28,
                    'name' => '兵庫県',
                    'region_id' => 4,
                    'slug' => 'hyogo',
                ),
            28 =>
                array(
                    'id' => 29,
                    'name' => '奈良県',
                    'region_id' => 4,
                    'slug' => 'nara',
                ),
            29 =>
                array(
                    'id' => 30,
                    'name' => '和歌山県',
                    'region_id' => 4,
                    'slug' => 'wakayamao',
                ),
            30 =>
                array(
                    'id' => 31,
                    'name' => '鳥取県',
                    'region_id' => 6,
                    'slug' => 'tottori',
                ),
            31 =>
                array(
                    'id' => 32,
                    'name' => '島根県',
                    'region_id' => 6,
                    'slug' => 'shimane',
                ),
            32 =>
                array(
                    'id' => 33,
                    'name' => '岡山県',
                    'region_id' => 6,
                    'slug' => 'okayama',
                ),
            33 =>
                array(
                    'id' => 34,
                    'name' => '広島県',
                    'region_id' => 6,
                    'slug' => 'hiroshima',
                ),
            34 =>
                array(
                    'id' => 35,
                    'name' => '山口県',
                    'region_id' => 6,
                    'slug' => 'yamaguchi',
                ),
            35 =>
                array(
                    'id' => 36,
                    'name' => '徳島県',
                    'region_id' => 6,
                    'slug' => 'tokushima',
                ),
            36 =>
                array(
                    'id' => 37,
                    'name' => '香川県',
                    'region_id' => 6,
                    'slug' => 'kagawa',
                ),
            37 =>
                array(
                    'id' => 38,
                    'name' => '愛媛県',
                    'region_id' => 6,
                    'slug' => 'ehime',
                ),
            38 =>
                array(
                    'id' => 39,
                    'name' => '高知県',
                    'region_id' => 6,
                    'slug' => 'kochi',
                ),
            39 =>
                array(
                    'id' => 40,
                    'name' => '福岡県',
                    'region_id' => 7,
                    'slug' => 'fukuoka',
                ),
            40 =>
                array(
                    'id' => 41,
                    'name' => '佐賀県',
                    'region_id' => 7,
                    'slug' => 'saga',
                ),
            41 =>
                array(
                    'id' => 42,
                    'name' => '長崎県',
                    'region_id' => 7,
                    'slug' => 'nagasaki',
                ),
            42 =>
                array(
                    'id' => 43,
                    'name' => '熊本県',
                    'region_id' => 7,
                    'slug' => 'kumamoto',
                ),
            43 =>
                array(
                    'id' => 44,
                    'name' => '大分県',
                    'region_id' => 7,
                    'slug' => 'oita',
                ),
            44 =>
                array(
                    'id' => 45,
                    'name' => '宮崎県',
                    'region_id' => 7,
                    'slug' => 'miyazaki',
                ),
            45 =>
                array(
                    'id' => 46,
                    'name' => '鹿児島県',
                    'region_id' => 7,
                    'slug' => 'kagoshima',
                ),
            46 =>
                array(
                    'id' => 47,
                    'name' => '沖縄県',
                    'region_id' => 7,
                    'slug' => 'okinawa',
                ),
        ));
    }
}
