<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Showing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = Movie::all();
        foreach ($movies as $movie) {
            $date = now();
            $date->minute = 0;
            $date->second = 0;
            
            for ($i = 0; $i < 5; $i++) {
                $date = $date->addDay();
                $date->hour = fake()->randomElement([9, 12, 17, 19]);
                Showing::create([
                    "movie_id"=> $movie->id,
                    'price' => fake()->randomDigitNotZero() * 10,
                    'showing_datetime' => $date,
                    'room' => fake()->randomDigitNotZero(),
                    'limit' => fake()->randomElement([30, 50, 100, 150])
                ]);
            }
        }
    }
}
