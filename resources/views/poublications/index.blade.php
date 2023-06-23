@extends('layouts.master')
@section('title', 'poublications')

@section('content')
<a class="bg-blue-300" href="{{ route('poublications.create') }}">create new one</a> <br>
<h2 class="mx-auto">Poblications</h2>
<p class="text-green-200">{{ session('success') }}</p>

@foreach ($myPoblications as $Poblication)

<div class="w-6/12 mx-auto flex flex-col m-2 bg-red-100 p-2">

    <h2 class="t text-lg font-bold ">{{ $Poblication->titre }}</h2>
    <p>{{ $Poblication->body }}</p>
    @isset($Poblication->image)
    <div class="bg-green-100  max-h-[170px] flex justify-center border border-black">
        <img src="{{ asset('storage/'. $Poblication->image) }}" alt="" class="object-contain">
    </div>
    <a href="{{ route('poublications.edit',$Poblication->id  ) }}"
        class="bg-blue-200 p-2 px-4 w-fit m-1 rounded-sm mx-auto">Modifie</a>
    @endisset
</div>
@endforeach
@endsection
