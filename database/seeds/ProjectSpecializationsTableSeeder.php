<?php

use Illuminate\Database\Seeder;

use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ProjectSpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('project_specializations')->insert([
            'id' => Uuid::uuid4()->toString(),
            'projectId' => '6fef0951-a474-4596-bdb7-f5c6208215d2',
            'specializationId' => 'a6684e01-4370-45c8-a601-52951764fcbc',
            'createdAt' => Carbon::now(),
            'updatedAt' => Carbon::now(),
            'deletedAt' => null
        ]);

    }
}
