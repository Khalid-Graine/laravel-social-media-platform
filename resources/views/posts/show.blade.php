@extends('layouts.master')
@section('title', 'Posts')
@section('content')
    <div class="w-6/12 mx-auto flex justify-center ">
        <x-cart-post
        :post="$post"
        />
    </div>
@endsection
