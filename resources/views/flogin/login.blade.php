@extends('layouts.master')
@section('title', 'create')

@section('content')
<div class="w-full h-screen flex justify-center items-center">
    <div class="flex justify-center flex-wrap bg-[#e1e1e1] h-fit w-fit p-3 rounded-md shadow-sm shadow-black">
        <form action="{{ route('loginlogin')  }}" method="post">
            @csrf
            <div>
                <label for="email">email</label> <br>
                <input name="email" type="email"  class="w-full">
                @error('email')
                 {{ $message }}
                @enderror
            </div>
            <div>
                <label for="password">password</label> <br>
                <input name="password" type="password"  class="w-full">
                  @error('pass')
                 {{ $message }}
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full rounded-md p-2 my-2 px-4 text-white bg-blue-500">Log in</button>
            </div>
        </form>
        <div class="mt-2 w-full flex justify-center">
            <p>if you don't have account
                <a href="{{ route('profiles.create') }}" class="text-blue-400">Sign Up</a> ?
            </p>
        </div>
    </div>
</div>
@endsection
