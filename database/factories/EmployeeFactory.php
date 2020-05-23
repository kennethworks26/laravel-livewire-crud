<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
// use App\Company;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $company_ids = \DB::table('companies')->select('id')->get();
    $company_id = $faker->randomElement($company_ids)->id;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'company_id' => $company_id,
        'phone' => $faker->phoneNumber
    ];
});
