<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('App\Models\Project');
        $usersIDs = DB::table('users')->pluck('id');
        $codeRandom = 'P-'.strtolower(Str::random(10));

        
        DB::table('projects')->insert([
            'id' => Uuid::uuid4()->toString(),
            'currencyId' => '23071dbb-b4e7-4325-bb5a-d9ee730329b5',
            'advertiseId' => '415e8b0a-3618-4316-85e4-2402d853cd20',
            'userId' => $faker->randomElement($usersIDs),
            'code' => $codeRandom,
            'name'=> 'Cari MC resepsi pernikahan',
            'isAvailable' => false,
            'address' => 'Jl Cipinang Cempedak III/4 A',
            'description' => 'Cari MC untuk acara resepsi pernikahan durasi 2 jam',
            'cost' => 450000,
            'province' => 'DKI Jakarta',
            'city' => 'Kota Jakarta Timur',
            'createdAt' => Carbon::now(),
            'updatedAt' => Carbon::now(),
            'deletedAt' => null
        ]);
        

    }
}
