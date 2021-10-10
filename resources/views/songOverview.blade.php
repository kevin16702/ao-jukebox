<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                song overview            
            </h2>
        </x-slot>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

            @foreach($songs as $key => $song)
                    <div class="border-bottom p-2">
                    {{ __($song->artist)}} 
                    {{ __($song->name)}} </br>
                    {{ __($song->duration)}}
                    </br>
                    <div class="d-flex">
                    @if(isset($list))
                    {{ (Form::open(['route' => ['saveToPlaylist', $genreId], 'class' => 'd-flex']))}}
                    {{ (Form::hidden('songId', $song->id))}}
                    <select class="rounded mr-2" name="dropdown">
                    @foreach($list as $playlist)
                        <option value="{{($playlist->id)}}">{{($playlist->name)}}</option>
                    @endforeach
                    </select>
                    {{  (Form::submit('+ playlist', ['class' => 'btn btn-success']))}} 
                    {{(Form::close())}}
                    @endif
                    <a class="btn btn-primary ml-2" href="{{ route('addSongToPlaylist', [$genreId ,$song->id]) }}">+ playlist</a>
                    </div>
                    </div>
                @endforeach
                </div>
    </div>
</x-app-layout>