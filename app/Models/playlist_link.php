<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Http\Controllers\PlaylistController;

class playlist_link extends Model
{
    use HasFactory;
    
    public function getSongs()
    {
        $playlistArray = DB::table('playlists')->get()->toArray();
        $songs = [];
        foreach($playlistArray as $key => $playlistName){
            $songIds = DB::table('playlist_link')->where(['playlistId' => $playlistName->id])->get()->toArray();
            $songs[] = [];
            
            foreach($songIds as $songId)
            {
                $arr = DB::table('songs')->where(['id' => $songId->songId])->get()->toArray();
                array_push($songs[$key], [$arr[0], 'songId' => $songId->id]);
            }
            $name = $playlistName->name;
            $duration = PlaylistController::calculateDuration($songs[$key]);
            $playlists[] = [
                'id' => $playlistName->id,
                'name' => $playlistName->name,
                'duration' => $duration,
                'songs' => $songs[$key]
            ];
        }
        if(isset($playlists)){
        return $playlists;
        }
        return;
    }
    public function edit($request)
    {
        $name = $request->get('name');
        $id = $request->get('id');
        DB::table('playlists')->where('id', $id)->update(['name' => $name]);
    }
    public function saveToExisting($request)
    {
        $playlistId = $request->get('dropdown');
        $songId = $request->get('songId');
        DB::table('playlist_link')->insert([
            'playlistId' => $playlistId,
            'songId' => $songId
        ]);

    }
    public function deletePlaylist($request, $id)
    {
        DB::table('playlists')->where('id', $id)->delete();
        DB::table('playlist_link')->where('playlistId', $id)->delete();
    }
    public function deleteSong($songId)
    {
        DB::table('playlist_link')->where('id', $songId)->delete();
    }
}
