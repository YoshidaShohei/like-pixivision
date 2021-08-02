@extends('layouts.admin')

@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\BlogController@create') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $blog)
                                <tr>
                                    <th>{{ $blog->id }}</th>
                                    <td>{{ \Str::limit($blog->title, 100) }}</td>
                                    <td>{{ \Str::limit($blog->tag, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\BlogController@edit', ['id' => $blog->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\BlogController@delete', ['id' => $blog->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection