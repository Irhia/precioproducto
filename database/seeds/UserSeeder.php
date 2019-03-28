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

        //SUPERADMIN

        $role_user = Role::where('name', 'superadmin')->first();
        //Creo 1 usuario fijo y específico
        $user = User::create ([
        'name' => 'Bea',
        'email' => 'bhc@gmail.com',
        'email_verified_at' => now(),
        // Encripta los 8 unos.
        'password' => Hash::make ('11111111'), // password
        'remember_token' => Str::random(10),

        ]);
        $user->roles()->attach($role_user);

        //ADMIN

        $role_user = Role::where('name', 'admin')->first();
        //Creo 1 usuario fijo y específico
        $user3 = User::create ([
        'name' => 'Irhia',
        'email' => 'ir@gmail.com',
        'email_verified_at' => now(),
        // Encripta los 8 unos.
        'password' => Hash::make ('11112222'), // password
        'remember_token' => Str::random(10),

        ]);

        //Si tiene varios roles, 
        //Primero se asigna el pirmer rol y luego el otro.    
        $user3->roles()->attach($role_user);

        $role_user_2 = Role::where('name', 'user')->first();
        $user3->roles()->attach($role_user_2);


        $role_user = Role::where('name', 'admin')->first();
         //Creo 1 usuario fijo y específico
        $user3 = User::create ([
        'name' => 'Pepa',
        'email' => 'pepa@gmail.com',
        'email_verified_at' => now(),
        // Encripta los 8 unos.
        'password' => Hash::make ('11112222'), // password
        'remember_token' => Str::random(10),

        ]);

        $user3->roles()->attach($role_user);

        
        $role_user = Role::where('name', 'user')->first();
        //Invento 5 usuarios a boleo
        $users = factory(App\User::class,5)->create();
        //A cada uno de estos le asignamos un role (user)
        foreach ($users as $user) {
            $user->roles()->attach($role_user);
        }

    }
}
