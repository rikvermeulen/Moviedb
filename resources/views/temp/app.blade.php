@extends('layout')

@section('content')
    @include ('layouts.partials.header')
    <header class="bg-secondary shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    <main class="container mx-auto">

        {{--@livewire('navigation-dropdown')--}}

        <!-- Page Heading -->


        <!-- Page Content -->
            {{ $slot }}

        @stack('modals')
    </main>
    {{--footer--}}
    @include ('layouts.partials.footer')

@endsection
