@extends('layouts.app')

@section('title', '登録済みニュースの一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="mx-auto">
        <h1 class="text-center">{{ $artist->artist_title }}</h1>
        @foreach($images as $image)
            <img src="{{ asset('storage/images/' . $image->artist_image_path) }}">
        @endforeach
        </div>
    </div>
</div>
@endsection