<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('genre') }}
        </h2>
    </x-slot>   
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-3">
                @foreach($genres as $genre)
                        <div class="border-bottom p-2 d-flex mx-5">
                        <div class="d-flex align-items-center">{{ __($genre->name)}}</div>
                        <a class="btn btn-primary ml-auto mr-5" href="{{ route('songOverview', $genre->id)}}">Filter</a>
                        </div>
                    @endforeach
                    </div>
        </div>
</x-app-layout>