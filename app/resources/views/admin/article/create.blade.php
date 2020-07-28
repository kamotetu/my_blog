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
            <form action="{{ route('article.store') }}" method="post">
                @csrf
                <div class="article_create_genre_area">
                    <div class="article_create_genre_headline">
                        <p>ジャンル</p>
                    </div>
                    <div class="article_create_genre_input">
                        <input type="text">
                    </div>
                </div>
                <div class="article_create_title_area">
                    <div class="article_create_title_headline">
                        <p>タイトル</p>
                    </div>
                    @if(isset($error['title']))
                        <p class="alert">{{ $error['title'] }}</p>
                    @endif
                    <div class="article_create_title_input">
                        <textarea name="" rows="1" class="article_create_title_input_form"></textarea>
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
                    @if(isset($error['article']))
                        <p class="alert">{{ $error['article'] }}</p>
                    @endif
                    <div class="article_create_article_input">
                        <textarea name="" rows="10" id="article_create_article_input_form"></textarea>
                    </div>
                </div>
                <div class="article_create_submit_area">
                    <button type="submit" id="input_article_submit">投稿する</button>
                    <button type="submit" id="input_article_temporary">下書きとして保存</button>
                </div>
            </form>
        </div>
        <div class="article_create_right_area">
            <div class="article_view_preview_area">
                <div class="article_view_preview">
                    <p>プレビュー</p>
                </div>
            </div>
            <div class="article_view_genre_area">
                <div class="article_view_genre">
                    
                </div>
            </div>
            <div class="article_view_title_area">
                <div class="article_view_title">

                </div>
            </div>
            <div class="article_view_tag_area">
                <div class="article_view_tag">

                </div>
            </div>
            <div class="article_view_article_area">
                <div class="article_view_article">

                </div>
            </div>
        </div>
    </div>
@endsection