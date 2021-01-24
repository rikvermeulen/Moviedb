@extends('layout')

@section('content')
    <main class="index">
        @include ('layouts.partials.header')
        <section class="container mx-auto px-4 pt-16">
                <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
                    <div class="md:ml-24">
                        <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $blog['title'] }}</h2>
                        <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $blog['date'] }}</h2>
                        <div class="flex flex-wrap items-center text-gray-400 text-sm">
                            <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $blog['body'] }}</h2>

                        </div>
                        <p>Writen by {{$blog['author']}}</p>
                        <p>Last edited by {{$blog->user->name}}</p>
                    </div>
                </div>
        </section>
    </main>
    {{--footer--}}
    @include ('layouts.partials.footer')

@endsection
