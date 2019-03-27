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

        //La creación de datos de roles debe ejecutarse primero.

        $this->call(RoleTableSeeder::class);

        //Los usaurios necesitarán los roles previamente generados.

        $this->call(UserTableSeeder::class);


        // $this->call(UsersTableSeeder::class);
        $this ->call(CategoriesSeeder::class);
        $this ->call(WebsSeeder::class);
        $this ->call(UserSeeder::class);
        $this ->call(AdsSeeder::class);
    }
}
