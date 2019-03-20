<?php

use Illuminate\Database\Seeder;

use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create ([
        'name' => 'Bea',
        'email' => 'bhc@gmail.com',
        'email_verified_at' => now(),
        /* Encripta los 8 unos. */
        'password' => Hash::make ('11111111'), // password
        'remember_token' => Str::random(10),

        ]);
    }
}
