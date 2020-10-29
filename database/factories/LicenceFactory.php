<?php

use Faker\Generator as Faker;

$factory->define(\App\Licence::class, function (Faker $faker) {
    return [
        'image' => 'https://cdn1.iconfinder.com/data/icons/online-banking/80/Online_banking_finance-02-512.png',
        'name' => $faker->name(),
        'national_id' => $faker->numberBetween(10,99)."-".$faker->numberBetween(100000,1000000)."-".strtoupper($faker->randomLetter())."-".$faker->numberBetween(10,99),
        'gender' => $faker->randomElement(array("Male", "Female")),
        'dob' => $faker->date('Y-m-d',"2005-01-01"),
        'date_of_issue' => $faker->date('Y-m-d', now()),
        'licence_no' => $faker->numberBetween(10000000, 9999999999999),
        'email' => $faker->email(),
        'mode' => $faker->randomElement(array("Full-time", "Part-time")),
        'course' => $faker->randomElement(array(
            "ND in: Accounting",
            "ND Purchasing and Supply", "ND in Secretarial Studies",
            "ND in Information Technology",
            "NC Hairdressing/Cosmetology/ Beauty Therapy",
            "NC in Diesel Plant Fitting",
            "NC in Draughting & Design Technology",
            "NC in Plant/ Production Engineering",
            "ND in Technical & Vocational Education  (HEXCO)"
            )
        ),

    ];
});
