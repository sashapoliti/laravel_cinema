<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helpers as Helper;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = __DIR__ . '/movies.csv';
        $data = Helper::getCsvData($path);
        foreach ($data as $index => $movie) {
            if ($index !== 0) {
                $new_movie = new Movie();
                $new_movie->title = $movie[0];
                $new_movie->description = $movie[1];
                $new_movie->minutes = $movie[2];
                $new_movie->language = $movie[3];
                $new_movie->thumb = $movie[4];
                $new_movie->trailer = $movie[5];
                $new_movie->release_date = $movie[6];
                $new_movie->slug = Movie::generateSlug($new_movie->title);
                $new_movie->save();
            }
        }
    }
}
