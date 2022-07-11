<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class UserSpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Models\UserSpecializations');
        $usersIDs = DB::table('users')->pluck('id');

        DB::table('user_specializations')->insert([
            'id' => Uuid::uuid4()->toString(),
            'specializationId' => 'a61c6194-1e18-4f3e-a465-750a329047a9',
            'userId' => $faker->randomElement($usersIDs),
            'isMain' => false,
            'createdAt' => Carbon::now(),
            'updatedAt' => Carbon::now(),
            'deletedAt' => null
        ]);

    }
}
