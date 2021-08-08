@extends('layouts.app')

@section('title', '登録済みニュースの一覧')

@section('content')

<div class="container">
<h4>search '{{ $cond_title }}' result</h4>
<div class="row">
    @foreach($posts as $post)
            <div class="card card-margin mx-auto" style="width: 12em;">
            <a href="/palody-image/{{ $post->id }}">
            <img src="{{ asset('storage/images/' . $post->palody_image_path) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->palody_title }}</h5>
                </div>
            </a>
            </div>
    @endforeach
</div>

@endsection