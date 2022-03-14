<?php

namespace Database\Seeders;

use App\Models\TalkshowRegistration;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        for($i = 1; $i <= 300; $i++){
 
            $data = [
                "birthdate" => '',
                "region" => '',
                "city" => '',
                "address" => '',
                "institution" => '',
                "profession" => '',
            ];

            $time = '';

            DB::table('talkshow_registrations')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->numberBetween(25,40),
                'data' => $data,
                'status' => 1,
                'serial_number' => $time.TalkshowRegistration::count().rand(11111,99999),
            ]);

      }
    }
}
