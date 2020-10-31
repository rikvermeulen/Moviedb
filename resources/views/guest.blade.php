@extends('layout')

@section('content')

<main>
    @include ('layout.partials.header')
    {{ $slot }}
</main>
{{--footer--}}
@include ('layout.partials.footer')

@endsection
