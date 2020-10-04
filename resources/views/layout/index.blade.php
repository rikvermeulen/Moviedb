@extends('layout')

@section('content')
    <main class="index">
        @include ('layout.partials.header')
        <section class="container mx-auto px-4 pt-16">
            <h1>Index</h1>
        </section>
    </main>
    {{--footer--}}
    @include ('layout.partials.footer')

@endsection
