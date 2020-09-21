<header>
    <nav class="border-b border-gray-700">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movies.index') }}">Logo</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a class="hover:text-gray-500" href="{{ route('movies.index') }}">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a class="hover:text-gray-500" href="">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a class="hover:text-gray-500" href="">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown></livewire:search-dropdown>
                <div class="md:ml-4 mt-3 md:mt-0">
                    @guest
                        <ul class="flex">
                            <li class="md:ml-6 mt-3 md:mt-0">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="md:ml-6 mt-3 md:mt-0">
                                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                             </li>
                        </ul>
                        @endif
                    @else
                    <ul class="flex">
                        <li class="md:mr-6 mt-4 md:mt-0 ">
                            {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>--}}

                            <div class="" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <a href="{{route('home')}}">
                            <img src="/images/avatar.png" alt="avatar" class="rounded-full w-8 h-8">
                        </a>
                    </ul>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>
