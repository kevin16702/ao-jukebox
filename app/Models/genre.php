<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;

    public function getGenres()
    {
        return DB::table('genres')->get();
    }

    public function filterSongs($genreId)
    {
        return DB::table('songs')->where('genreId', $genreId)->get();
    }
}
