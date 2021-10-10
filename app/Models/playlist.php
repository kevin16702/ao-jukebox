<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;
use Route;
use DB;

class playlist extends Model
{  
    use HasFactory;
    public function __construct(request $request)
    {
        if(Session::has('playlist'))
        {
            $playlist = $request->session()->get('playlist');
        }
        else{
            $request->session()->put('playlist');
            
            $playlist = $request->session()->get('playlist');
        }
    }
    
    public function show($request)
    {
        $songids = $request->session()->get("playlist");
        $songs = [];
        if($songids == null){
                return; 
            } else{
                foreach($songids as $songid){
                array_push($songs, DB::table('songs')->where('id', $songid)->get()->toArray());
                }
            }
        return $songs;
    }

    public function deleteSong($request)
    {
        $songId = intVal(Route::current()->parameter('songId'));
        $playlistcopy = $request->session()->get('playlist');
        $playlistcopy = array_values($playlistcopy);
        unset($playlistcopy[$songId]);
        $request->session()->forget('playlist');
        $playlist = new Playlist($request);
        $request->session()->put('playlist', $playlistcopy);
    }
    public function put($request)
    {
        $songId = Route::current()->parameter('songId');
        $request->session()->push("playlist", $songId);
    }
    
    public function saveToDatabase($request)
    {   
        $playlist = $request->session()->get('playlist');
        if($playlist != null){
            $playlistId = DB::table('playlists')->insertGetId([
                'name' => $request->get('name')
            ]);
            foreach($playlist as $song)
            {
                DB::table('playlist_link')->insert([
                    'playlistId' => $playlistId,
                    'songId' => $song
                ]);
            }
        }
    }
    public function get()
    {
        return DB::table('playlists')->get()->toArray();
    }
}
