@extends('layouts.master')
@section('title', 'edit')

@section('content')
<p>{{ $Poblication->id}}</p>
{{-- <form action="{{ route('poublications.update', $poblication->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-col w-8/12 mx-auto ">
        <h2>create new poublication</h2>

        <label for="titre">titre</label>
        <input type="text" name="titre" value="{{ old('titre', $poblication->titre) }}">
        <p class="text-red-500">
            @error('titre')
                {{ $message }}
            @enderror
        </p>

        <label for="body">body</label>
        <input type="text" name="body" value="{{ old('body') }}">
        <p class="text-red-500">
            @error('body')
                {{ $message }}
            @enderror
        </p>


        <label for="image">image</label>
        <input type="file" name="image" id="">
        <p class="text-red-500">
            @error('image')
                {{ $message }}
            @enderror
        </p>


        <button type="submit" class="p-3 bg-blue-600 rounded-sm m-1 text-white font-extrabold text-lg">Submit</button>
    </div>
</form> --}}

@endsection
