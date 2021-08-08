@extends('layouts.app')

@section('title', '登録済みニュースの一覧')

@section('content')
<div class="container">
<h4>Recently Palody</h4>
<a href="#">View More..</a>
<div class="row">
    @foreach($palodies_posts as $palody_blog)
            <div class="card card-margin mx-auto" style="width: 12em;">
            <a href="/palody-image/{{ $palody_blog->id }}">
            <img src="{{ asset('storage/images/' . $palody_blog->palody_image_path) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $palody_blog->palody_title }}</h5>
                </div>
            </a>
            </div>
    @endforeach
</div>

<div class="container">
    <h4>Recently Tags</h4>
    <a href="#">View More..</a>
    <div class="row">
        @foreach($tags_posts as $tag_blog)
            <div class="card card-margin mx-auto" style="width: 12em;">
            <a href="/tag-image/{{ $tag_blog->id }}">
            <img src="{{ asset('storage/images/' . $tag_blog->tag_image_path) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $tag_blog->tag_title }}</h5>
                </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<div class="container">
    <h4>Recently Artists</h4>
    <a href="#">View More..</a>
    <div class="row">
        @foreach($artists_posts as $artist_blog)
            <div class="card card-margin mx-auto" style="width: 12em;">
            <a href="/artist-image/{{ $artist_blog->id }}">
            <img src="{{ asset('storage/images/' . $artist_blog->artist_image_path) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $artist_blog->artist_title }}</h5>
                </div>
                </a>
            </div>
        @endforeach
    </div>
</div>    

@endsection