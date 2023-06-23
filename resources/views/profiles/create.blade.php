@extends('layouts.master')
@section('title', 'create')

@section('content')

<div class="w-full h-screen flex justify-center items-center">
    <div class=" flex justify-center bg-[#e1e1e1] p-2 shadow-sm shadow-black">
        <form action="{{ route('profiles.store')  }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="w-full text-center font-bold mb-2">Create New accounte</p>
            <div>
                <label for="name">name</label> <br>
                <input name="name" type="text"  value="{{ old('name') }}" class="w-full">
                @error('name')
                <p class="bg-red-200">{{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="email">email</label> <br>
                <input name="email" type="email" value="{{ old('email') }}" class="w-full">
                @error('email')
                <p class="bg-red-200">{{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="password">password</label> <br>
                <input name="password" type="password" value="{{ old('password') }}"  class="w-full">
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
                <textarea name="bio" id="" cols="15" rows="5">{{ old('name') }}</textarea>
                @error('bio')
                <p class="bg-red-200">{{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="image">image</label>
                <input type="file" name="image" >
                @error('image')
                <p class="bg-red-200">{{ $message }} </p>
                @enderror
            </div>
            <div class="flex justify-center">
                <button type="submit" class="p-2 px-5  bg-blue-300 mt-2 rounded-full">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
