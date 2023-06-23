@props(['profiles'])


@foreach ($profiles as $profile)
    <a href="{{ route('profiles.show', $profile) }}" class="flex">

        <div class="m-1 flex gap-2 items-center w-full">

            <img src="{{ asset('storage/' . $profile->image) }}" alt=""
                class="bg-red-400  w-[30px] h-[30px] overflow-hidden
            rounded-full object-cover">

            <p class="t text-sm">{{ $profile->name }}</p>

        </div>
    </a>
@endforeach
