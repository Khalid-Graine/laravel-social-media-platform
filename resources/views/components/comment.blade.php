<div class="p-1 flex  ">
    <div class="flex-shrink-0">
        <a href="{{ route('profiles.show', $commentaire->profile->id) }}"><img
                src="{{ asset('storage/' . $commentaire->profile->image) }}" alt=""
                class="w-[30px] h-[30px] rounded-full "></a>
    </div>


    <div class=" bg-gray-100 ml-2 p-1  rounded-lg flex-grow flex flex-wrap">
        {{-- 1 --}}
        <div>
            <a href="{{ route('profiles.show', $commentaire->profile->id) }}">
                <p class="font-semibold">{{ $commentaire->profile->name }}</p>
            </a>
        </div>
        {{-- 2 --}}
        @auth
        @if ($commentaire->profile_id == Auth::user()->id)
        <div class="ml-auto">
            <form action="{{ route('commentaires.destroy', $commentaire) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <i class="fa-solid fa-trash-can  opacity-40 px-2 text-gray-700 hover:text-red-600 hover:opacity-100" title="delete"></i>
                </button>
            </form>
        </div>
    @endif
        @endauth

        {{-- 3 --}}
        <div class="w-full">{{ $commentaire->content }}</div>
    </div>


</div>
