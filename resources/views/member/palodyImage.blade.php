@extends('layouts.app')

@section('title', '登録済みニュースの一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="mx-auto">
        <h1 class="text-center">{{ $palody->palody_title }}</h1>
        <h1 class="text-center">{{ $palody->palody_tag }}</h1>
                <a href="{{ action('SearchController@tagSearch') }}" method="get" class="form-inline text-center" name="tagSearch">
                {{ $palody->palody_tag }}
                </a>        
        @foreach($images as $image)
            <img src="{{ asset('storage/images/' . $image->palody_image_path) }}">
        @endforeach
        </div>
    </div>
</div>
@endsection