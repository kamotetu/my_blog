@extends('layouts.front')

@section('content')
    <div class="index_article_container">
        <div class="index_top_title">
            <h2 class="index_near_article">
                最近の記事
            </h2>
        </div>
        {{-- @if(isset($recently_articles))
            @foreach($recently_articles as $article)
            <div class="index_article_content">
                <a href="">
                    <div class="index_title_area">
                        <h5>
                            {{ $article->title }}
                        </h5>
                    </div>

                    <div class="index_article_area">
                        {{ $article->article }}
                    </div>
                </a>
            </div>
            @endforeach
        @endif --}}
    </div>
@endsection