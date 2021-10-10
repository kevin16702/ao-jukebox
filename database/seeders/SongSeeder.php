<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $Mili = [
            'Sustain++', 'Rightfully', 'Camelia', 'Within', 'Static'
        ];
        $Charles_Mingus = [
            'Nostalgia  in times square', 'Moanin', 'Crying blues', 'Tensions', 'Day Dream'
        ];
        $Mick_Gordon = [
            'BFG Division', 'Rip & Tear', 'At Dooms Gate', 'Flesh and Blood', 'Rust, Dust & Guts'
        ];
        $Dire_Straits = [
            'Sultans of Swing', 'Walk of life', 'Brothers in Arms', 'Lions', 'Money for nothing'
        ];
        $Joe_Hisaishi = [
            'A town with an ocean view', 'A journey', 'Summer', 'One summers day', 'Marry go round of life'
        ];
        foreach($Mili as $song){
            DB::table('songs')->insert([
                'name' => $song,
                'artist' => 'Mili',
                'duration' => date("H:i:s", rand(180, 360)),
                'genreId' => 1
            ]); 
        }

        foreach($Charles_Mingus as $song){
            DB::table('songs')->insert([
                'name' => $song,
                'artist' => 'Charles Mingus',
                'duration' => date("H:i:s", rand(180, 360)),
                'genreId' => 3,
            ]); 
        }
        
        foreach($Mick_Gordon as $song){
            DB::table('songs')->insert([
                'name' => $song,
                'artist' => 'Mick Gordon',
                'duration' => date("H:i:s", rand(180, 360)),
                'genreId' => 5,
            ]); 
        }

        foreach($Dire_Straits as $song){
            DB::table('songs')->insert([
                'name' => $song,
                'artist' => 'Dire Straits',
                'duration' => date("H:i:s", rand(180, 360)),
                'genreId' => 2,
            ]); 
        }
        foreach($Joe_Hisaishi as $song){
            DB::table('songs')->insert([
                'name' => $song,
                'artist' => 'Joe Hisaishi',
                'duration' => date("H:i:s", rand(180, 360)),
                'genreId' => 4,
            ]); 
        }
    }
}
