@extends('layout')

@section('content')
    <main class="popular-tv">
        @include ('layouts.partials.header')
        <div class="container mx-auto px-4 pt-16">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Blog posts</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
               @foreach ($blogs as $blog)
                    <x-blog-post :blog="$blog" />
                @endforeach
            </div>
        </div>
    </main>
    {{--footer--}}
    @include ('layouts.partials.footer')

@endsection
