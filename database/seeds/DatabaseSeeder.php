<?php

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
        // $this->call(UsersTableSeeder::class);
        $this ->call(CategoriesSeeder::class);
        $this ->call(WebsSeeder::class);
        $this ->call(UserSeeder::class);
        $this ->call(AdsSeeder::class);
    }
}
