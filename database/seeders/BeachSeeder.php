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
        $cities = [
            'Roma',
            'Torino',
            'Firenze',
            'Otranto',
            'Catania',
            'Los Angeles',
            'Riccione',
            'Formentera',
            'Ibiza'
        ];

        $names = [
            'Lido dei Pini',
            'Lido degli Estensi',
            'Lido di Ostia',
            'Spiaggia Azzura',
            'Mare fuori',
            'Spiaggia Calabria',
            'Lido le 5 terre',
            'Spiaggia Tropical'
        ];

        $openingDate = $faker->dateTimeBetween('-2 months', '-1 months');
        $closingDate = $faker->dateTimeBetween($openingDate, '+2 months');

        for ($i=0; $i < 30; $i++) {
            $newBeach = new Beach();

            $newBeach->name = $faker->randomElement($names);
            $newBeach->city = $faker->randomElement($cities);
            $newBeach->n_umbrellas = $faker->numberBetween(20, 60);
            $newBeach->n_seats = $faker->numberBetween(30, 80);
            $newBeach->umbrellas_day_price = $faker->randomFloat(2, 10, 80);
            $newBeach->opening_date = $openingDate;
            $newBeach->closing_date = $closingDate;
            $newBeach->has_volley = $faker->boolean();
            $newBeach->has_football = $faker->boolean();
            $newBeach->description = $faker->text(300);

            $newBeach->save();
        }
    }
}
