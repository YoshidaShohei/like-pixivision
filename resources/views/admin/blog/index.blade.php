@extends('layouts.admin')

@section('title', '登録済みニュースの一覧')

@section('content')
<div class="container">
    <div class="row">
            <a href="{{ action('Admin\BlogController@palodyCreate') }}" role="button" class="btn btn-primary create-btn">パロディ記事新規作成</a>
            <a href="{{ action('Admin\TagController@create') }}" role="button" class="btn btn-primary create-btn">タグ記事新規作成</a>
            <a href="{{ action('Admin\ArtistController@create') }}" role="button" class="btn btn-primary create-btn">アーティスト記事新規作成</a>
    </div>
</div>
@endsection