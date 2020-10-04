<div class="actor mt-8">
    <a href="{{ route('actors.show', $actor['id']) }}">
        <img src="{{ $actor['profile_path'] }}" alt="profile image" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
        <div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
    </div>
</div>
