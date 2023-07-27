<?php

namespace Database\Seeders;

use App\Models\Beach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BeachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $cities = config('beachesData.cities');
        $names = config('beachesData.names');

        for ($i=0; $i < 30; $i++) {
            $newBeach = new Beach();

            $newBeach->name = $faker->randomElement($names);
            $newBeach->city = $faker->randomElement($cities);
            $newBeach->n_umbrellas = $faker->numberBetween(20, 60);
            $newBeach->n_seats = $faker->numberBetween(30, 80);
            $newBeach->umbrellas_day_price = $faker->randomFloat(2, 10, 80);
            $newBeach->opening_date = $faker->dateTimeBetween('-2 months', '-1 months');
            $newBeach->closing_date = $faker->dateTimeBetween('-2 months', '+2 months');
            $newBeach->has_volley = $faker->boolean();
            $newBeach->has_football = $faker->boolean();
            $newBeach->description = $faker->text(300);

            $newBeach->save();
        }
    }
}
