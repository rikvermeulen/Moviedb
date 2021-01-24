@extends('layout')

@section('content')
    <main class="popular-tv">
        @include ('layouts.partials.header')
        <div class="container mx-auto px-4 pt-16">
            <h2 class="uppercase tracking-wider pb-6 text-orange text-xl font-semibold">Blog posts</h2>

           {{--{{dd($showLike)}}--}}
            @if($loginDays == true)
            <div>
                @component('components.breadcrumbs')

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
                @endcomponent

                <div class="products-header">
                    <h1 class="pb-6 pt-6 text-lg font-semibold">{{ $categoryName }}</h1>
                   <div>
                        <strong>Date:</strong>
                        <a href="{{ route('blog.index', ['category'=> request()->category, 'sort' => 'old_new']) }}">old to new</a> |
                        <a href="{{ route('blog.index', ['category'=> request()->category, 'sort' => 'new_old']) }}">new to old</a>

                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                <ul class="list-none">
                    <strong>Category:</strong>
                    @foreach ($categories as $category)
                        <li class="{{ setActiveCategory($category->slug) }} mb-2 text-orange text-lg"><a href="{{ route('blog.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                <div class=" col-span-2">

                    @forelse ($blogs as $blog)
                        <x-blog-post :blog="$blog" />
                       @empty
                           <div style="text-align: left">No items found</div>
                       @endforelse

                       <div class="spacer"></div>
                       {{--{{ $blogs->appends(request()->input())->links() }}--}}
                </div>
                </div>
            </div>
            @elseif($loginDays == false)
                <p>no acces, Please wait 5 days until creation of account to acces this page</p>
            @endif
        </div>
    </main>
    {{--@if($user->loggedInMoreThanFiveDays())
        @endif--}}
    {{--footer--}}
    @include ('layouts.partials.footer')

@endsection
