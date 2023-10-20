<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Movie::create([
            "title"=> 'Avatar (2009)',
            "poster" =>'http://ia.media-imdb.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg',
            'description' => 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.',
            'genre' => 'Action, Adventure, Fantasy'
        ]);

        Movie::create([
            "title"=> 'I Am Legend (2007)',
            "poster" =>'http://ia.media-imdb.com/images/M/MV5BMTU4NzMyNDk1OV5BMl5BanBnXkFtZTcwOTEwMzU1MQ@@._V1_SX300.jpg',
            'description' => 'Years after a plague kills most of humanity and transforms the rest into monsters, the sole survivor in New York City struggles valiantly to find a cure.',
            'genre' => 'Drama, Horror, Sci-Fi'
        ]);

        Movie::create([
            "title"=> 'The Avengers (2012)',
            "poster" =>'http://ia.media-imdb.com/images/M/MV5BMTk2NTI1MTU4N15BMl5BanBnXkFtZTcwODg0OTY0Nw@@._V1_SX300.jpg',
            'description' => 'Earth\'s mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity.',
            'genre' => 'Action, Sci-Fi, Thriller'
        ]);

        Movie::create([
            "title"=> '300 (2006)',
            "poster" =>'http://ia.media-imdb.com/images/M/MV5BMjAzNTkzNjcxNl5BMl5BanBnXkFtZTYwNDA4NjE3._V1_SX300.jpg',
            'description' => 'King Leonidas of Sparta and a force of 300 men fight the Persians at Thermopylae in 480 B.C.',
            'genre' => 'Action, Drama, Fantasy'
        ]);
    }
}
