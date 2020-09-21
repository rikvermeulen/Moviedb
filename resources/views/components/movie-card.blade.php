<div>
    <div class="mt-8">
        <a href="{{ route('movies.show', $movie['id']) }}">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="mt-2">
            <a href="{{ route('movies.show', $movie['id']) }}" class="text-lig mt-2 hover:text-gray:300">{{ $movie['title'] }}</a>
            <div class="flex items-center text-gray-400 text-sm mt-1">
                <span><svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg></span>
                <span class="ml-1">{{ $movie['vote_average'] * 10 .'%' }}</span>
                <span class="mx-2">|</span>
                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
            </div>
            <div class="text-gray-400 text-sm">
                @foreach($movie['genre_ids'] as $genre)
                    {{ $genres->get($genre)}}@if(!$loop->last), @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
