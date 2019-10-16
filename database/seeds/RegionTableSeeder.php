<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('regions')->delete();
        \DB::table('regions')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => '北海道・東北',
                    'slug' => 'tohoku',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => '関東',
                    'slug' => 'kanto',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => '東海',
                    'slug' => 'tokai',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => '関西',
                    'slug' => 'kansai',
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => '甲信越・北陸',
                    'slug' => 'koushinetsu',
                ),
            5 =>
                array(
                    'id' => 6,
                    'name' => '中国・四国',
                    'slug' => 'chushikoku',
                ),
            6 =>
                array(
                    'id' => 7,
                    'name' => '九州・沖縄',
                    'slug' => 'kyushu',
                ),

        ));
    }
}
