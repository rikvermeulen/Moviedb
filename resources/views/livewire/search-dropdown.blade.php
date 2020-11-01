<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input wire:model.debounce.500ms="search" type="text" class="bg-secondary rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" autocomplete="chrome-off" placeholder="Search" x-ref="search" @keydown.window="if (event.keyCode == 191) { event.preventDefault(); $refs.search.focus();}" @focus="isOpen = true" @keydown="isOpen = true" @keydown.escape.window="isOpen = false" @keydown.shift.tab="isOpen = false">
    <div class="absolute top-0">
        <svg class="fill-search w-4 text-gray-700 mt-2 sm:ml-2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke="#a0afc0" stroke-width="2"/></svg>
    </div>
    <div wire:loading class="spinner top-0 right-0 mr-5 mt-4"></div>
    @if (strlen($search) > 2)
        <div class="z-50 absolute bg-ternary text-sm rounded w-64 mt-2" x-show.transition.opacity="isOpen">
            @if( $searchResults->count() > 0)
                <ul>
                    @foreach( $searchResults as $result)
                     {{--{{dd($searchResults)}}--}}
                    @if($result['media_type'] == 'movie')
                        <li class="border-b border-border">
                            <a href="{{ route('movies.show', $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center" @if ($loop->last) @keydown.tab="isOpen = false" @endif>
                                @if( $result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $result['title'] }}</span>
                                <span class="ml-4">{{ $result['release_date'] }}</span>
                            </a>
                        </li>
                      @elseif($result['media_type'] == 'person')
                        <li class="border-b border-border">
                            <a href="{{ route('actors.show', $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center" @if ($loop->last) @keydown.tab="isOpen = false" @endif>
                                @if( $result['profile_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['profile_path'] }}" alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $result['name'] }}</span>
                            </a>
                        </li>
                        @elseif($result['media_type'] == 'tv')
                            <li class="border-b border-border">
                                <a href="{{ route('tv.show', $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center" @if ($loop->last) @keydown.tab="isOpen = false" @endif>
                                    @if( $result['poster_path'])
                                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                    @else
                                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                    @endif
                                    <span class="ml-4">{{ $result['name'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>

            @else
                <div class="px-3 py-3">
                    No results for "{{ $search }}"
                </div>
            @endif
        </div>
        @endif
</div>
