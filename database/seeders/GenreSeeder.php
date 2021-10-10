<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre_array = [
            "avant-garde J-pop", "Rock", "Jazz", "Classic", "Metal"
        ];
        foreach($genre_array as $genre){
        DB::table('genres')->insert([
            'name' => $genre
        ]); 
        }
    }
}
