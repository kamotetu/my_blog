@extends('layouts.app')
@section('headLineArea')
    <span class="navbar-brand">投稿一覧</span>
    <a href="{{ route('admin.article.create') }}" class="navbar-sub">
        <span class="navbar-sub_content">新規作成</span>
    </a>
    <a href="{{ route('admin.article.genre_edit') }}" class="navbar-sub">
        <span class="navbar-sub_content">ジャンル編集</span>
    </a>
@endsection

@section('content')
    <div class="list_article_container">
        @if($articles->isNotEmpty())
            @foreach($articles as $article)
                <div class="list_article_content">
                    <a href="{{ route('admin.article.create', ['id' => $article->id]) }}">
                        <div class="list_title_area">
                            <h5>
                                {{ $article->title }}
                            </h5>
                        </div>
        
                        <div class="list_article_area">
                            {{ mb_strimwidth($article->article, 0, 50, "...") }}
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="list_article_content">
                <p>投稿はありません</p>
            </div>
        @endif
    </div>
@endsection
