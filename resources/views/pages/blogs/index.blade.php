@extends('pages.main')
@section('container')
<div class="container-fluid my-2">
    <div class="row justify-content-center  mt-5 p-5">
        <h1 class="text-center">All Activity Halal</h1>
        <div class="col-md-6">
            <form action="/blogs">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">

                @endif
                @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">

                @endif
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
        </div>

        @if ($blogs->count())
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div class="card my-3 p-0" style="width:95%; margin:0 auto;">
                        <img src="{{ asset('storage/'.$blogs[0]->image) }}" class="card-img-top" alt="..."
                            style="height:auto; overflow:hidden;">
                        <div class="card-body text-center">
                            <h3 class="card-title"><a href="/blog/{{ $blogs[0]->slug }}"
                                    class="text-decoration-none text-dark">{{ $blogs[0]->title }}</a></h3>
                            <small class="text-muted">
                                <p>By : <a href="/blogs?author={{ $blogs[0]->author->username }}"
                                        class="text-decoration-none">{{ $blogs[0]->author->name }}</a> in <a
                                        href="/blogs?category={{ $blogs[0]->category->slug }}"
                                        class="text-decoration-none">{{ $blogs[0]->category->name }}</a> {{
                                    $blogs[0]->created_at->diffForHumans() }}</p>
                            </small>
                            <p class="card-text">{{ $blogs[0]->excerpt }} </p>
                            <a href="/blogs/{{ $blogs[0]->slug }}" class="btn btn-primary justify-content-center">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($blogs->skip(1) as $blog)
        <div class="col-md-4 my-3">
            <div class="card d-block-inline rounded-4">
                <div class="position-absolute px-0 py-2"><a href="/blogs?category={{ $blog->category->slug }}"
                        class="text-decoration-none px-2 py-2 text-light"
                        style="background-color: rgba(0, 0, 0, 0.3)">{{ $blog->category->name }}</a></div>

                <div style="height:250px; overflow:visible">
                    <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->category->name }}" width="100%"
                        class="img-fluid" style="height: 100%">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <small class="text-muted">
                        <p>By : <a href="/blogs?author={{ $blog->author->username }}" class="text-decoration-none">{{
                                $blog->author->name }}</a> {{ $blog->created_at->diffForHumans() }}</p>
                    </small>
                    <p class="card-text">{{ $blog->excerpt }}</p>
                    <a href="/blogs/{{ $blog->slug }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-center fs-4">No Activity Found</p>
@endif
<div class="d-flex justify-content-center">
    {{ $blogs->links() }}
</div>
@endsection