<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'glo',
            'email' => 'glo@glo.it',
            'password' => Hash::make('1234')
            ],
            [
                'name' => 'nathan',
                'email' => 'nathan@nathan.it',
                'password' => Hash::make('4321')
            ],
            [
                'name' => 'noah',
                'email' => 'noah@noah.it',
                'password' => Hash::make('0000')
            ]
            ];


        foreach ($users as $user) {
            User::create($user);
        }
    }
}
