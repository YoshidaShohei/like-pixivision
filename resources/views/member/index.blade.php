@extends('layouts.app')

@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $blog)
            <div class="card-group">
                <div class="card col-lg-6 card-margin">
                    <img src="{{ asset('storage/images/' . $blog->image_path) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    
    
@endsection