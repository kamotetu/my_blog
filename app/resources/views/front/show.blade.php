@extends('layouts.front')

@section('content')
    <div class="show_article_container">
        <div class="show_article_genre_area">
            <div class="show_article_genre">
                <span>{{ $article->genre()->name }}</span>
            </div>
        </div>
        <div class="show_article_title_area">
            <div class="show_article_title">
                <h5>{{ $article->title }}</h5>
            </div>
        </div>
        <div class="show_article_tag_area">
            <div class="show_article_tag">

            </div>
        </div>
        <div class="show_article_article_area">
            <div class="show_article_article">
                {{ $article->article }}
            </div>
        </div>
    </div>
@endsection