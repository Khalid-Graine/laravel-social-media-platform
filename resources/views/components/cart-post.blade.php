@props(['post', 'showAll'])




<div class="rounded-md overflow-hidden ml-2 border-[0.5px] p-1 my-2">


    {{-- profile --}}
    <div class="flex items-center justify-between gap-1  py-1">
        <div class="flex items-center">
            @isset($post->profile->image)
                <img src="{{ asset('storage/' . $post->profile->image) }}" alt=""
                    class="w-[45px] h-[45px] overflow-hidden rounded-full object-cover mr-1">
            @endisset

            <a href="{{ route('profiles.show', $post->profile->id) }}" class="font-semibold">
                {{ $post->profile->name }}
            </a>
        </div>
        <div>
            @can('update', $post)
                <div class="flex flex-wrap justify-end gap-1 text-xl">
                    <a href="{{ route('posts.edit', $post) }}" class="h hover:text-green-500 p-1 px-3 rounded-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="hover:text-red-400 p-1 px-3 rounded-sm">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    @endcan
                </div>
            @endcan
        </div>
    </div>

    {{-- post --}}
    <div
        class=" flex bg-slate-300 outline-1 outline-black   max-h-[400px]   justify-center items-center overflow-hidden">
        <a href="{{ route('posts.show', $post->id) }}">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="object-fill">
        </a>

    </div>

    {{-- content and crud --}}
    <div class="py-1">
        <div class="flex">
            <p class="fo font-semibold mr-1">{{ $post->profile->name }}</p>
            <p>{{ $post->content }}</p>
        </div>
    </div>


    {{-- likes --}}
    @auth

        <div class="flex items-center justify-between  mb-2 px-1">
            {{-- like --}}

            <div class="flex gap-2 items-center justify-center">
                <form action="{{ route('loves.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="loves" value="1">
                    <input type="hidden" name="profile_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    @if ($post->isLikedByUser(Auth::user()->id))
                        <button type="submit">
                            <i class="fa-solid fa-heart text-2xl mt-1 text-red-600"></i>
                        </button>
                    @else
                        <button type="submit">
                            <i class="fa-regular fa-heart text-2xl mt-1 text-red-600"></i>
                        </button>
                    @endif
                </form>
                <p class="text text-black-100 text-zinc-600 font-medium mr-3">{{ $post->likes }} Likes</p>

            </div>

            {{-- comment --}}
            <div class="flex items-center gap-2 ">
                <i class="fa-regular fa-comment text-green-500 text-2xl mt-1"></i>
                <p class="text text-black-100 text-zinc-600 font-medium"> {{ $post->commentaire->count() }} Comments</p>
            </div>

            {{-- saves --}}
            <div class="flex gap-2 items-center ">
                <form action="{{ route('saved_posts.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="profile_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="flex items-center">
                        @if ($post->isSavedByUser(Auth::user()->id))
                            <i class="fa-solid fa-bookmark text-2xl  mt-1" title="unsave"></i>
                        @else
                            <i class="fa-regular fa-bookmark text-2xl  mt-1" title="save"></i>
                        @endif
                        <p class="text text-black-100 text-zinc-600 font-medium ml-3">{{ $post->saves }} Saves</p>
                    </button>
                </form>
            </div>

        </div>

    @endauth

    {{-- commentaires --}}
    <div>
        @foreach ($post->commentaire as $commentaire)
            <x-comment :commentaire="$commentaire" />
        @endforeach
    </div>




    {{-- add comment --}}
    @auth
        <div class="my-2 ">
            <form action="{{ route('commentaires.store') }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="profile_id" value="{{ Auth::user()->id }}">
                <div class="flex justify-center items-center px-1">
                    <input type="text" name="content" required class="flex-grow rounded-full mr-1 "
                        placeholder="Add a comment ...">
                    <button type="submit" class="">
                        <i
                            class="fa-solid fa-paper-plane text-2xl  hover:text-xl
                        text-white bg-blue-600 rounded-full flex justify-center items-center  w-[45px] h-[45px]"></i>
                    </button>
                </div>
            </form>
        </div>
    @endauth

</div>
