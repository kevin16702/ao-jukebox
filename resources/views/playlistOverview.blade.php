<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               @if($playlist != null)
               {{ __($playlist->name)}}
               @else
               playlist
               @endif      
            </h2>
        </x-slot>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                @if($songs != null)
            @foreach($songs as $key => $song)
                    <div class="border-bottom p-2">

                    {{ __($song[0]->artist)}}
                    {{ __($song[0]->name)}} </br>
                    {{ __($song[0]->duration)}}
                    </br> 
                    <a href="{{ route('deleteSongFromPlaylist', $key)}}" class="btn btn-danger">verwijder</a>
                    </div>
                @endforeach
                @endif
                @if($totalDuration != null)
                Total Time: {{__($totalDuration)}}
                @endif
                <button onclick="getElementById('form').classList.toggle('d-none')">Save to user</button>
                <div class="card d-none" id="form">
                {{ (Form::open(['route' => 'savePlaylistToUser', 'class' => 'd-flex']))}}
                    
                  {{  (Form::text('name', '', ['required' => 'required']))}}
                  {{ (Form::label('name', 'Name', ['class' => 'form-control', 'placeholder' => 'choose a name']))}}
                  <div class="col-12">
                  {{  (Form::submit('save', ['class' => 'btn btn-success col-3']))}}
                  </div>
                  {{ (Form::close())}}
                </div>
                </div>
    </div>
</x-app-layout>