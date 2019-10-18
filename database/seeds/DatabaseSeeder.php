<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrefTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        factory(User::class, 1500)->create();
    }
}
