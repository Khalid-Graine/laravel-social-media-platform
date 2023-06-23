
@extends('layouts.master')
@section('title', 'create')

@section('content')
@if (session()->has('success'))
<x-alert type="succes">{{ session('success') }}</x-alert>
@endif
<div class="h-screen w-full  flex justify-center items-center">

    <form action="{{ route('profiles.update', $profile->id)  }}"
        method="POST"
        enctype="multipart/form-data"
        >
       @csrf
       @method('PUT')
       <div class="w-fit bg-gray-300 p-2 shadow-sm shadow-black flex flex-col gap-2">
        <div>
            <label for="name">name</label> <br>
            <input name="name" type="text"
            value="{{ old('name', $profile->name) }}" class="w-full">
            @error('name')
            <p class="bg-red-200">{{ $message }} </p>
            @enderror
        </div>
        <div>
            <label for="email">email</label> <br>
            <input name="email" type="email" value="{{  old('email', $profile->email) }}" class="w-full">
            @error('email')
            <p class="bg-red-200">{{ $message }} </p>
            @enderror
        </div>
        <div>
            <label for="password">password</label> <br>
            <input name="password" type="password"   class="w-full">
            @error('password')
            <p class="bg-red-200">{{ $message }} </p>
            @enderror
        </div>
        <div>
            <label >password_cofirmation</label> <br>
            <input name="password_confirmation" type="password"  class="w-full">
            @error('password_confirmation')
            <p class="bg-red-200">{{ $message }} </p>
            @enderror
        </div>

        <div>
            <label for="bio">bio</label> <br>
            <textarea name="bio"  cols="80" rows="3">{{  old('bio', $profile->bio) }}</textarea>
            @error('bio')
            <p class="bg-red-200">{{ $message }} </p>
            @enderror
        </div>
        <div>
            <label for="image">image</label>
            <input type="file" name="image" >
        </div>
        @error('image')
            <p class="bg-red-200">{{ $message }} </p>
            @enderror

            <button type="submit" class="bg-blue-500 justify-end p-2 mx-auto text-white font-bold text-lg rounded-md">Modify</button>

       </div>

   </form>

</div>

@endsection
