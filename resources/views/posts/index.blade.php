@extends('layouts.master')
@section('title', 'Explore')
@section('content')
    <div class="w-11/12 mt-6 mx-auto flex flex-col justify-center items-center" >
        <p class="w-full text-center font-bold">All Posts ({{$posts->count()}})</p>
        <div class="w-full  flex flex-wrap">
        @foreach ($posts as $post)
        @isset($post)
                <a href="{{ route('posts.show', $post) }}">
                    <img src="{{ asset('storage/'.$post->image) }}" alt=""
                    class="w-[300px] h-[300px] m-[1px] overflow-hidden object-cover hover:opacity-90 cursor-pointer">
                </a>
            @endisset
        @endforeach
    </div>
    </div>

@endsection
