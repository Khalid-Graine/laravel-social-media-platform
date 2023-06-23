@extends('layouts.master')
@section('title', 'profil')

@section('content')

    <table class="w-9/12 mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">name</th>
                <th scope="col" class="px-6 py-3">email</th>
                <th scope="col" class="px-6 py-3">bio</th>
                <th scope="col" class="px-6 py-3">more</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $profile['id'] }}</th>
                    <td class="px-6 py-4"> {{ $profile['name'] }}</td>
                    <td class="px-6 py-4"> {{ $profile['email'] }}</td>
                    <td class="px-6 py-4"> {{ Str::limit($profile['bio'], 50, '...') }}</td>
                    <td><a href="{{ route('profiles.show', $profile->id) }}" class="text-blue-400">see</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $profiles->links('mypagination', ['foo' => 'ha ana hihihihihi']) }}



@endsection
