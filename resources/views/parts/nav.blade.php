<nav class="h-screen p-5  text-lg font-semibold flex flex-col justify-between
  border-r-[1px] border-black-200">


    {{-- first dev --}}
    <div class="flex flex-col text-lg gap-4">

        <a href="{{ route('home') }}" class="hover:text-blue-700">
            <i class="fa-solid fa-house mr-3 text-xl"></i>
            home
        </a>

        @auth
            <a href="{{ route('posts.index') }}" class="hover:text-blue-700">
                <i class="fa-brands fa-internet-explorer mr-3 text-xl"></i>
                Explore
            </a>
            <a href="{{ route('posts.create') }}" class="hover:text-blue-700">
                <i class="fa-solid fa-circle-plus mr-3 text-xl"></i>
                Create Post
            </a>

             <a href="{{ route('saved_posts.index') }}" class="hover:text-blue-700">
                <i class="fa-solid fa-bookmark mr-3 text-xl"></i>
                Saved Posts
            </a>
            <a href="{{ route('profiles.show', Auth::user()->id ) }}" class="hover:text-blue-700">
                <i class="fa-solid fa-user mr-3 text-xl"></i>
               profile
            </a>
            <a href="{{ route('profiles.edit', Auth::user()->id) }}" class="hover:text-blue-700">
                <i class="fa-solid fa-pen-to-square mr-3 text-xl"></i>
                Edit profile
            </a>


        @endauth

    </div>

    {{-- second div --}}
    @auth

        <div>
            <hr class="mb-2">
            <div>
                <a href="{{ route('logout') }}" class="font-bold hover:text-red-600">
                    <i class="fa-regular fa-circle-left mr-3 text-xl"></i>
                    logout</a>
            </div>
            <p>

            </p>
        </div>
    @endauth
    @guest

        <div>
            <hr class="mb-2">
            <a href="{{ route('loginShow') }}" class="hover:text-blue-700">
                <i class="fa-solid fa-right-to-bracket mr-3 text-xl "></i>
                login</a>
        </div>
    @endguest
</nav>
