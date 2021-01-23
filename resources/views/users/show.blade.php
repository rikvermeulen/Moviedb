@extends('layout')

@section('content')
    <main class="index">
        @include ('layouts.partials.header')
        <section class="container mx-auto px-4 pt-16">
            <div class="row">
                <div class="">
                    <div class="">
                        <h2> Show User</h2>
                    </div>
                    <div class="">
                        <a class="flex inline-flex items-center bg-button text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150" href="{{ route('users.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <div class="">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="">
                    <div class="f">
                        <strong>Roles:</strong>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{--footer--}}
    @include ('layouts.partials.footer')

@endsection
