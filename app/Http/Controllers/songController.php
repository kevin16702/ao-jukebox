<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Route;
use DB;

class songController extends Controller
{
    public function addSong(Request $request)
    {   
        $song = new song($request);

    }
}
