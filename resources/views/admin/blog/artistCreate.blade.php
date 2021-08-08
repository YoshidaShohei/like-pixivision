@extends('layouts.admin')
@section('title', 'ニュースの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>アーティスト別新規作成</h2>
                <form action="{{ action('Admin\ArtistController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">アーティスト別タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="artist_title" value="{{ old('artist_title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">アーティスト別タグ関連</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="artist_tag" rows="20">{{ old('artist_tag') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">アーティスト別画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="artist_image_path">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>    
@endsection