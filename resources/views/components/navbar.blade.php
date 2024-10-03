<div class="bg-slate-800 shadow-lg">
    <nav
        class="max-w-[85rem] w-full mx-auto px-4 sm:flex-nowrap flex flex-wrap basis-full items-center justify-between py-3 bg-white-500 border-grey-500 text-sm">
        <a class="sm:order-1 text-slate-200 flex-none text-xl font-semibold focus:outline-none focus:opacity-80"
            href="{{ route('posts.index') }}">SUperApp</a>
        <div class="sm:order-3 flex items-center gap-x-2">

            <button type="button"
                class="sm:hidden hs-collapse-toggle relative size-7 flex justify-center items-center gap-x-2 rounded-lg bg-transparent text-gray-200 shadow-sm focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
                id="hs-navbar-alignment-collapse" aria-expanded="false" aria-controls="hs-navbar-alignment"
                aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-alignment">

                <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>

                <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
                <span class="sr-only">Toggle</span>
            </button>

            @auth
                <div class="relative grid place-items-center" x-data="{ open: false }">
                    {{-- Dropdown Button --}}
                    <button @click="open = !open" type="button"
                        class="w-8 h-8 overflow-auto rounded-full bg-slate-100
                    focus:outline-none focus:ring-1 focus:ring-slate-100
                    focus:ring-offset-2 focus:ring-offset-slate-800">
                        <img src="https://picsum.photos/200" alt="">
                    </button>

                    {{-- Dropdown Menu --}}
                    <div x-show="open" @click.outside="open = false"
                        class="bg-white shadow-lg absolute top-10 rigth-0 rounded-lg 
                    overflow-hidden font-light">

                        <p class="text-sm text-gray-700 pl-4 pr-8 pt-2 pb-1">{{ auth()->user()->username }}</p>

                        <a href="{{ route('dashboard') }}" class="block hover:bg-slate-100 text-gray-700 pl-4 pr-8 py-2">
                            Dashboard
                        </a>

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="w-full block hover:bg-slate-100 text-gray-700 pr-10 py-2 mb-1">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('register') }}">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-500 text-slate-200 shadow-sm hover:bg-cyan-600 focus:outline-none focus:bg-cyan-600 disabled:opacity-50 disabled:pointer-events-none">
                        Register
                    </button>
                </a>
                <a href="{{ route('login') }}">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-500 text-slate-200 shadow-sm hover:bg-cyan-600 focus:outline-none focus:bg-cyan-600 disabled:opacity-50 disabled:pointer-events-none">
                        Login
                    </button>
                </a>
            @endguest

        </div>
        <div id="hs-navbar-alignment"
            class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2"
            aria-labelledby="hs-navbar-alignment-collapse">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
                <a class="font-medium text-slate-200 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                    href="{{ route('posts.index') }}">Posts</a>
                <a class="font-medium text-slate-200 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                    href="{{ route('dashboard') }}">Dashboard</a>
            </div>
        </div>
    </nav>
</div>
