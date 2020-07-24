@extends('layouts.app')
@section('headLine')
    投稿する
@endsection
@section('headLineUrl')
    {{ route('article.create') }}
@endsection
@section('content')
    <div class="article_create_container">
        <div class="article_create_left_area">
            <form action="">
                {{-- @csrf --}}
            <div class="article_create_title_area">
                <div class="article_create_title_headline">
                    <p>タイトル</p>
                </div>
                <div class="article_create_title_input">
                    <input type="text" class="article_create_title_input_form">
                </div>
            </div>
            <div class="article_create_genre_area">
                <div class="article_create_genre_headline">
                    <p>ジャンル</p>
                </div>
                <div class="article_create_genre_input">
                    <input type="text">
                </div>
            </div>
            <div class="article_create_tag_area">
                <div class="article_create_tag_headline">
                    <p>タグ</p>
                </div>
                <div class="article_create_tag_input">
                    <input type="text" class="article_create_tag_input_form">
                </div>
            </div>
            <div class="article_create_article_area">
                <div class="article_create_article_headline">
                    <p>記事</p>
                </div>
                <div class="article_create_article_input">
                    <textarea name="" rows="10" id="article_create_article_input_form"></textarea>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection