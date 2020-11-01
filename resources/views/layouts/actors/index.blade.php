@extends ('layout')
@section('pageTitle', 'imdb')

@section ('content')
    <main class="index">
        @include ('layouts.partials.header')
        <section class="container mx-auto px-4 pt-16">
            <div class="popular-actors">
                <h2 class="uppercase tracking-wider text-orange text-lg font-semibold">Popular Actors</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach($popularActors as $actor)
                        <x-actor-card :actor="$actor"/>

                    @endforeach
                </div>
            </div>
            <div class="page-load-status my-8">
                <div class="flex justify-center">
                    <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
                </div>
                <p class="infinite-scroll-last">End of content</p>
                <p class="infinite-scroll-error">Error</p>
            </div>
        </section>
    </main>
    @section('scripts')
        <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
        <script>
            var elem = document.querySelector('.grid');
            var infScroll = new InfiniteScroll( elem, {
                path: '/actors/page/@{{#}}',
                append: '.actor',
                status: '.page-load-status',
                // history: false,
            });
        </script>
    @endsection
    {{--footer--}}
    @include ('layouts.partials.footer')


@endsection
