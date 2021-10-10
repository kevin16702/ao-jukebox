<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Route;
use DB;
use App\Http\Controllers\GenreController;

class PlaylistController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $playlist = new playlist($request);
        $songs = $playlist->show($request); 
        $duration = PlaylistController::calculateDuration($songs);
        return view('playlistOverview', ['songs' => $songs, 'totalDuration' => $duration, 'playlist' => null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    static function calculateDuration($songs)
    {   
        if($songs !== null){
        $sum = strtotime('00:00:00');
        $sum2=0;
        foreach ($songs as $song){
          $sum1=strtotime($song[0]->duration)-$sum;
          $sum2 = $sum2+$sum1;
        }
        $sum3=$sum+$sum2;
        return date("H:i:s",$sum3);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {   
        $playlist = new Playlist($request);
        $playlist->deleteSong($request);
        return redirect()->route('playlist');
    }
    
    public function push(Request $request)
    {
        $playlist = new Playlist($request);
        $playlist->put($request);
        return redirect()->route('playlist');
    }
    public function saveToUser(Request $request)
    {
        $playlist = new Playlist($request);
        $playlist->saveToDatabase($request);
        return redirect()->route('playlist');
    }
}