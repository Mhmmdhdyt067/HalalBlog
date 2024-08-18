@extends('pages.main')
@section('container')
<div class="container">
    <div class="row mt-5 p-5">
        <div class="col-lg-10">
            <h1 class="mb-3">{{ $blog->title }}</h1>
            <a href="/blogs" class="btn btn-success"><i class="bi bi-backspace-fill"></i> Back to All Post</a>
            <br>
            <div style="width:100%; height:auto overflow:hidden">
                <img src="{{ asset('storage/'.$blog->image) }}" alt="" class="img-fluid mt-3" style="">
            </div>
            <article class="my-3 fs-5">
                {!! $blog->body !!}
            </article>
        </div>
    </div>
</div>
@endsection