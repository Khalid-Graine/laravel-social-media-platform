@extends('layouts.master')
@section('title', 'create')

@section('content')
    <form action="{{ route('poublications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col w-8/12 mx-auto ">
            <h2>create new poublication</h2>

            <label for="titre">titre</label>
            <input type="text" name="titre" id="">
            <p class="text-red-500">
                @error('titre')
                    {{ $message }}
                @enderror
            </p>

            <label for="body">body</label>
            <input type="text" name="body" id="">
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
    </form>

@endsection
