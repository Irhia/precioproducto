<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'admin')->first();
        //Creo 1 usaurio fijo y específico
        $user = User::create ([
        'name' => 'Bea',
        'email' => 'bhc@gmail.com',
        'email_verified_at' => now(),
        // Encripta los 8 unos.
        'password' => Hash::make ('11111111'), // password
        'remember_token' => Str::random(10),

        ]);

        $user->roles()->attach($role_user);
        
        $role_user = Role::where('name', 'user')->first();
        //Invento 5 usuarios a boleo
        $users = factory(App\User::class,5)->create();
        //A cada uno de estos le asignamos un role (user)
        foreach ($users as $user) {
            $user->roles()->attach($role_user);
        }

    }
}
