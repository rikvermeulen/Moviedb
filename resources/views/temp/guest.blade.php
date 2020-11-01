@extends('layout')

@section('content')

<main>
    @include ('layouts.partials.header')
    {{ $slot }}
</main>
{{--footer--}}
@include ('layouts.partials.footer')

@endsection
