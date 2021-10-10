<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            </h2>
        </x-slot>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my-2">
                @if(isset($playlists))
                @foreach($playlists as $key => $playlist)
                <div class="card my-2 p-3">
                Name: {{__($playlist['name'])}}
                </br>
                Duration: {{__($playlist['duration'])}}
                <button class="btn btn-warning col-2" onclick="getElementById('form<?php echo $key; ?>').classList.toggle('d-none')">edit</button>
                <div class="card d-none" id='form<?php echo $key; ?>'>
                {{ (Form::open(['route' => 'editPlaylist']))}}
                <div class="d-flex m-2">
                  {{  (Form::text('name', '', ['required' => 'required']))}}
                  {{  (Form::hidden('id', $playlist['id'], ['required' => 'required']))}}
                {{ (Form::label('name', 'Name', ['class' => 'm-2', 'placeholder' => 'choose a name']))}}
                </div>
                </br>
                  {{  (Form::submit('save', ['class' => 'btn btn-success col-3']))}}
                  {{ (Form::close())}}
                </div>
                <button class="btn btn-primary col-2 my-2" onclick="getElementById('songlist<?php echo $key; ?>').classList.toggle('d-none')">Songs</button>
                <div id="{{'songlist' . $key}}" class="d-none">  
                @foreach($playlist['songs'] as $key2 => $song)
                 Name:   {{__($song[0]->name)}}
                 </br>
                 Artist:   {{__($song[0]->artist)}}
                 </br>
                 Duration:   {{__($song[0]->duration)}}
                 </br>
                 <a href="{{ route('deleteSong', $song['songId'])}}" class="btn btn-danger">verwijder</a>
                 <hr>
                 @endforeach
                </div>
                <a href="{{route('deletePlaylist', $playlist['id'])}}" class="btn btn-danger col-2">Delete</a>
                </div>
                @endforeach
                @endif
                    </div>
                </div>
    </div>
</x-app-layout>