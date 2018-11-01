<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            # code...

            DB::table('licences')->insert([
                'name' => str_random(10) . " " . str_random(10),
                'national_id' => rand(20, 99) . "-" . rand(1000000, 9999999) . "G" . rand(20, 99),
                'licence_no' => rand(1000000, 9999999),
                'gender' => 'Male',
                'dob' => rand(10, 30) . "-" . rand(10, 12) . "-" . rand(1980, 1999),
                'date_of_issue' => rand(10, 30) . "-" . rand(10, 12) . "-" . rand(2010, 2017)
            ]);
        }
    }
}
