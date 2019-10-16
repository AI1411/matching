<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            0 => [
                'name' => 'admin'
            ],
            1 => [
                'name' => 'default'
            ],
            2 => [
                'name' => 'premium'
            ]
        ]);
    }
}
