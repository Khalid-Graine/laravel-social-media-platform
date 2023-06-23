@extends('layouts.master')
@section('title', 'Search')

@section('content', )
<div class="w-6/12 mt-6 mx-auto flex flex-col justify-center items-center" >
    <form action="{{ route('search.') }}" method="get">
        <label for="">Search</label>
        <input type="search" name="query" id="">
        <button type="submit"></button>
    </form>
</div>
@endsection
