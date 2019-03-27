<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role_user = Role::where('name', 'user')->first();
       $role_admin = Role::where('name', 'admin')->first();

       $user = new User();
       $user->name = 'User';
       $user->email = 'user@example.com';
       $user->password = bcrypt ('secret');
       $user->email_verified_at = now();
       $user->remember_token = Str::random(10);
       $user->save();

       $user->roles()->attach($role_user);

       $user = new User();
       $user->name = 'Admin';
       $user->email = 'admin@example.com';
       $user->password = bcrypt ('secret');
       $user->email_verified_at = now();
       $user->remember_token = Str::random(10);
       $user->save();

       $user->roles()->attach($role_admin);
    }
}
