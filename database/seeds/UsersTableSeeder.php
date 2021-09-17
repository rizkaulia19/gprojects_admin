<?php

use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('id_ID');
 
        \App\User::create([
            'id' => Uuid::uuid1()->toString(),
            'roleId' => '238d3456-b3b4-457d-8a8c-a50df9ca7a29',
            'name' => 'Admin Miranti',
            // 'nik' => '',
            'code' => 'G-C5A7A2BD',
            'username' => 'adminmiranti',
            'password' => bcrypt('mirantipassword'),
            'email' => 'miranti@gmail.com',
            'phone' => '6282311272566',
            'isGpro' => true,
            'isOnline' => true,
            'isFullyRegistered' => false,
            'isPriority' => false,
            'profilePhoto' => 'https://cdn.allfamous.org/people/avatars/min-yoongi-qkun-allfamous.org.jpg',
            'gender' => 'Wanita',
            'birthdate' => '25/11/1999',
            'point' => '0',
            'createdAt' => Carbon::now(),
            'updatedAt' => Carbon::now(),
            'deletedAt' => null
        ]);
    }
}