@extends('layouts.master')
@section('title', 'Create')
@section('content')
    <div class="w-full h-screen  flex justify-center items-center">

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mx-auto bg-gray-200 p-6 rounded-md flex flex-col gap-6 shadow-sm shadow-black">


                <div class="flex flex-col">

                    <input type="hidden" name="title" value="xxxxx">
                    @error('title')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="content">content</label>
                    <input type="text" name="content">
                    @error('content')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="image">image</label>
                    <input type="file" name="image">
                    @error('image')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500  p-3 text-white font-bold text-lg rounded-md">Submit</button>
            </div>
        </form>
    </div>
@endsection
