@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('Popüler Bloglar') }}</h1>
        <ul>
            @foreach($popularBlogs as $popularBlog)
                <li><a href="{{ route('admin.blogs.edit', $popularBlog->id) }}">{{ $popularBlog->title }}</a></li>
            @endforeach
        </ul>
                </div>
@endsection
