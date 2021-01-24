@if($blog->status == 1)
<div class="mb-12">
    <a href="{{ route('blog.show', $blog['id']) }}">
    </a>
    <div class="mt-2">
        <a href="{{ route('blog.show', $blog['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $blog['title'] }}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <div class="text-gray-400 text-sm">{{ $blog['body'] }}</div>
        </div>
    </div>
</div>
@endif
