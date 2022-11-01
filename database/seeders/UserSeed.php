<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $deleteUser = User::truncate(); 
        $date       = date("Y-m-d h:i:s");

        $users = [
            [
                'name'              => 'Hendro priyanto',
                'email'             => 'user@gmail.com',
                'password'          => bcrypt('123456'),
                'email_verified_at' => $date,
            ],
            [
                'name'              => 'Budi darmawan',
                'email'             => 'user2@gmail.com',
                'password'          => bcrypt('123456'),
                'email_verified_at' => $date,
            ],

        ];
         User::insert($users);
    }
}
