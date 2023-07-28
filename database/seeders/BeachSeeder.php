<?php

namespace Database\Seeders;

use App\Models\Beach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

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
        $elements = config('beachesData.elements');

        $client = new Client();

        for ($i=0; $i < $elements; $i++) {
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

            // Introduce a delay between requests to avoid rate limits
            sleep(1); // Sleep for 1 second

            // Fetch a random Unsplash image URL
            $response = $client->get('https://api.unsplash.com/photos/random', [
                'query' => [
                    'client_id' => Config::get('unsplashKey.access_key'),
                    'query' => 'beach',
                ],
                'verify' => false, // Disable SSL verification
            ]);

            $data = json_decode($response->getBody(), true);

            // Save the Unsplash image URL in the 'thumb' column
            $newBeach->thumb = $data['urls']['regular'];

            $newBeach->save();
        }
    }
}
