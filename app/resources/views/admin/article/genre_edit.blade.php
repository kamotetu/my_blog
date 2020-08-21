@extends('layouts.app')
@section('headLineArea')
@section('headLineArea')
    <span class="navbar-brand">ジャンル編集</span>
    <a href="{{ route('admin.article.create') }}" class="navbar-sub">
        <span class="navbar-sub_content">新規作成</span>
    </a>
@endsection
@section('content')
    <div class="article_genre_edit_area">
        <div class="article_genre_create_area">
            <form action="{{ route('admin.article.genre_create') }}" method="post">
                @csrf
                <label for="article_genre_create">新規登録</label>
                <br>
                <input type="text" name="genre" id="article_genre_create">
                <input type="submit" value="登録する">
            </form>
        </div>
        <div class="article_genre_patch_area">
            <span>編集する</span>
            @foreach($genres as $genre)
                <form action="{{ route('admin.article.genre_patch') }}" method="post" >
                    @csrf
                    @method('patch')
                    <input type="text" name="genre" value="{{ $genre->name }}">
                    <button type="submit" name="patch_genre_id" value="{{ $genre->id }}">変更する</button>
                </form>
                <form action="{{ route('admin.article.genre_delete') }}">
                    @csrf
                    @method('delete')
                    <button type="submit" name="delete_genre_id" value="{{ $genre->id }}">削除する</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection