<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ClickSpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('App\ClickSpecialization');
        $specializationsIDs = DB::table('specializations')->pluck('id');
        $usersIDs = DB::table('users')->pluck('id');

        for($i=1; $i<=19; $i++){
        	DB::table('click_specializations')->insert([
                'id' => Uuid::uuid4()->toString(),
                'specializationId' => '844af58d-fbb9-4455-bab3-381d4d23dda5',
                'userId' => $faker->randomElement($usersIDs),
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now(),
                'deletedAt' => null
        	]);
        }

    }
}
