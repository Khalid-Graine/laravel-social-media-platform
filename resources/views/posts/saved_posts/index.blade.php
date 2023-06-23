@extends('layouts.master')
@section('content')
<div class="w-6/12 mt-6 mx-auto flex flex-col justify-center items-center" >
    <p class="w-full text-center font-bold">Saved Posts ({{$posts->count()}})</p>
    @foreach ($posts as $post)
    @isset($post)
        <x-cart-post
        :post="$post"
        />
        @endisset
    @endforeach
</div>
@endsection
