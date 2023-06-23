@extends('layouts.master')
@section('content')
    {{-- div parent --}}
    <div class="flex flex-row   flex-wrap w-12/12  ">



        <div class="w-8/12 mt-2">
             {{-- create post --}}
        <div class="w-8/12 mx-auto  overflow-hidden p-2 ">

           @auth
           <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center flex-wrap">
                <img src="{{ asset('storage/'.Auth::user()->image) }}" class="w-[40px] h-[40px] mr-2 object-cover overflow-hidden rounded-full" alt="">
                <input type="hidden" name="title" value="xxx" >
                <input type="text" name="content" class=" flex-grow rounded-lg"
                placeholder="what's in your mind ... {{ Auth::user()->name }}">
               <label class="">
                <i class="fa-regular fa-image p-2 text-4xl cursor-pointer hover:opacity-50"></i>
                <input type="file" name="image" class="w-[110px]" hidden>
               </label>
                <button type="submit" class="mt-1 py-1 rounded-full
                w-full bg-blue-500 text-white font-semibold ">Post</button>
            </div>
        </form>
           @endauth
        </div>


        {{-- noutifications --}}
        <div class="w-8/12 mx-auto mt-1">
            @if (session()->has('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif
        </div>
            {{-- posts --}}
            <div class="w-8/12 mt-6 mx-auto flex flex-col justify-center items-center">
                @foreach ($posts as $post)
                    @isset($post)
                        <x-cart-post :post="$post" />
                    @endisset
                @endforeach
            </div>

        </div>

        {{-- profiles --}}
        <div class="w-3/12 fixed right-0 top-0  h-screen  p-3 border-l-[1px] border-black-100">

            {{-- user --}}
            @auth
                <div class="mb-6">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('profiles.show', Auth::user()->id ) }}" class="flex items-center gap-2">
                            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                            class="w-[50px] h-[50px] object-cover overflow-hidden rounded-full " alt="">
                        <p class="font-medium">{{ Auth::user()->name }}</p></a>
                        <a href="{{ route('logout') }}" class="ml-auto text-blue-500">Logout</a>
                    </div>
                </div>
            @endauth

            @guest
            <div class="mb-6 ">
                <div class="flex items-center  gap-2">
                    <i class="fa-solid fa-circle-user text-4xl"></i>
                    <a href="{{ route('profiles.create') }}" class=" text-blue-500">Create new accounte</a>
                </div>
            </div>
           @endguest


            {{-- suggestions --}}
            <p class=" font-bold mt-1 mb-1 text-gray-400">Suggested for you</p>
            <x-user-card :profiles="$profiles" />
            <div class="mt-3">
                {{ $profiles->links('pagination.profiles') }}
            </div>

        </div>


    </div>
@endsection
