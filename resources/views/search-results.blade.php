@extends('layout')
@section('title', 'Search Results')
@section('content')
    <main class="popular-tv">
        @include ('layouts.partials.header')
        <div class="container mx-auto px-4 pt-16">
        @section('content')

            @component('components.breadcrumbs')
                <a href="/">Home</a>
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <span>Search</span>
            @endcomponent

            <div class="container">
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="search-results-container container">
                <h1>Search Results</h1>
                <p class="search-results-count">{{ /*\App\Models\Blog::where('status', 1)->count()*/ $blogs->total() }} result(s) for '{{ request()->input('query') }}'</p>
                @if ($blogs->total() > 0)
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>link</th>
                            <th>title</th>
                            <th>Description</th>
                            <th>author</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($blogs as $blog)
                            @if($blog->status == 1)
                            <tr>
                                <th><a href="{{ route('blog.show', $blog['id']) }}" class="text-lg mt-2 hover:text-gray-300">Link</a></th>
                                <td>{{ $blog->title }}</td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>

                    {{ $blogs->appends(request()->input())->links() }}
                    <p>no results</p>
                @endif
            </div>

        @endsection
