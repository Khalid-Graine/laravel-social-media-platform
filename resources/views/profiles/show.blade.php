@extends('layouts.master')
@section('title', 'show')
@section('content')

    {{-- <div>
        @if (session()->has('success'))
            <x-alert type="succes">{{ session('success') }}</x-alert>
        @endif
    </div> --}}
    <div class="flex flex-col min-h-screen ">
        {{-- profile --}}
        <div class=" bg-gradient-to-b from-indigo-500 flex justify-center flex-col items-center p-4">
            <img src="{{ asset('storage/' . $profile->image) }}" alt="profileuser"
                class="overflow-hidden w-[150px] h-[150px] rounded-full object-cover" />
            <p class="f font-semibold">{{ $profile->name }} </p>
            <p>{{ $profile->bio }}</p>
            <div class="flex justify-between gap-6 mt-2">
                <div>
                    <i class="fa-solid fa-newspaper mr-1"></i>
                    <span>{{ $profile->posts->count() }}</span>
                    <span>Post</span>
                </div>
                <div>
                    <i class="fa-solid fa-heart mr-1"></i>
                    <span> {{ $profile->loves->count() }}</span>
                    <span> Loves</span>
                </div>
                <div>
                    <i class="fa-regular fa-comment mr-1"></i>
                    <span>   {{ $profile->commentaire->count() }}</span>
                    <span> Comments</span>

                </div>
                <div>
                    <i class="fa-solid fa-bookmark mr-1"></i>
                    <span> {{ $profile->savedposts->count() }}</span>
                    <span> Saved</span>

                </div>
            </div>
        </div>


        {{-- posts --}}
        @if ($profile->posts->count() === 0)
            <div class="flex justify-center items-center flex-grow">
                <div class="flex justify-center flex-col">
                    <i class="fa-solid fa-camera-retro mx-auto  text-5xl"></i>
                    <p class=" font-extrabold text-2xl">this user has no posts yet</p>
                </div>
            </div>
        @else
            <div class="w-6/12  flex flex-wrap justify-around mx-auto gap-2">
                @foreach ($profile->posts as $post)
                    <x-cart-post :post="$post" />
                @endforeach
            </div>
        @endif
    </div>
@endsection
