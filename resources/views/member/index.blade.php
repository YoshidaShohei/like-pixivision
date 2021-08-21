@extends('layouts.app')

@section('title', '登録済みニュースの一覧')

@section('content')
<div class="container">
    <h4>Recently Palody</h4>
    <a href="/">View More..</a>
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
</div>

<div class="container">
    <h4>Recently Tags</h4>
    <a href="/">View More..</a>
    <div class="row">

    </div>
</div>

<div class="container">
    <h4>Recently Artists</h4>
    <a href="/">View More..</a>
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

    <div>
        <div class="row">
            @foreach ($blogs as $key1 => $blog)
            {{--
                @if ($blog->images != null)
                    <div class="row">
                        @foreach ($blog->images as $key2 => $image)
                            <div>
                                key1: {{ $key1 }} key2: {{$key2}}
                                <img src="{{ asset('storage/image/'. $image->tag_image_path) }}">
                            </div>
                        @endforeach
                    </div>
                @endif
            --}}
            @endforeach
        </div>
    </div>  
</div>
@endsection
