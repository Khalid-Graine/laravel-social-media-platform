@extends('layouts.master')
@section('title', 'Edit Post')
@section('content')

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="m-2 w-6/12 mx-auto bg-gray-300 p-4 rounded-md flex flex-col">


           
            <input type="hidden" name="title" value="xxxxxxx">
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror


            <label for="content">content</label>
            <input type="text" name="content" value="{{ old('content', $post->content) }}">
            @error('content')
                <p class="text-red-500">{{ $message }}</p>
            @enderror


            @if ($post->image)
                <div class="flex justify-center my-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image"
                        class="w-[100px] h-[100px] rounded-lg overflow-hidden object-cover">
                </div>
            @endif
            <label for="image">Image</label>
            <input type="file" name="image">


            <button type="submit" class="bg-blue-500 m-1 p-3 text-white font-bold text-lg rounded-sm">Submit</button>
        </div>
    </form>

@endsection
