<?php

namespace App\Http\Controllers;
use App\Models\Playlist_link;
use Illuminate\Http\Request;

class playlistOverviewController extends Controller
{
    static function index()
    {   
        $playlist = new playlist_link();
        $playlists = $playlist->getSongs();
        return view('allplaylistOverview', ['playlists' => $playlists]);
    }
    public function edit(Request $request)
    {
        $playlist = new playlist_link();
        $playlists = $playlist->edit($request);
        return redirect()->route('playlistOverview');
    }
    public function saveToExisting()
    {
        $playlist = new Playlist_link();
        $playlist->saveToExisting();
    }
    public function delete(Request $request, $id)
    {
        $playlist = new Playlist_link();
        $playlist->deletePlaylist($request, $id);
        return redirect()->route('playlistOverview');
    }
    public function saveToPlaylist(Request $request, $genreId)
    {
        $playlist = new Playlist_link();
        $playlist->saveToExisting($request);
        return redirect()->route('songOverview', $genreId);
    }
    public function deleteSong($songId)
    {
        $playlist = new Playlist_link();
        $playlist->deleteSong($songId);
        return redirect()->route('playlistOverview');
    }
}