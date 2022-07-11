<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ProjectApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Models\ProjectApplicant');
        $usersIDs = DB::table('users')->pluck('id');

        DB::table('project_applicants')->insert([
            'id' => Uuid::uuid4()->toString(),
            'projectId' => 'fdd0a574-8fde-485c-9ab0-869d037ea436',
            'userId' => '1a0de13b-ef6f-4620-b0e8-0a9205f0476a',
            'status' => 'succeed',
            'createdAt' => Carbon::now(),
            'updatedAt' => Carbon::now(),
            'deletedAt' => null
        ]);

    }
}
