@extends ('layout')
@section('pageTitle', 'error?')

@section ('content')

    {{--header--}}
    @include ('layout.partials.header')
    <main>
        <div class="error">
            <div class="error-title">
                <div class="wrap">
                    <h2>Something went kaput</h2>
                    <p class="error-code">404 error</p>
                    <p class="error-message">I couldn't find your page! please feel free to return to the <a href="/">front page</a>. I am very sorry for any inconvenience.</p>
                </div>
            </div>
        </div>
    </main>
    {{--footer--}}
    @include ('layout.partials.footer')

@endsection
