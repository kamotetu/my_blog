@extends('layouts.app')
@section('content_js_area')
    <script src="{{ asset('js/jquery.autoexpand.js') }}" defer></script>
    <script src="{{ asset('js/create_article.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
@endsection
@section('headLineArea')
    <span class="navbar-brand">新規作成</span>
    <a href="{{ route('admin.article.create') }}" class="navbar-sub">
        <span class="navbar-sub_content">新規作成</span>
    </a>
    <a href="{{ route('admin.article.genre_edit') }}" class="navbar-sub">
        <span class="navbar-sub_content">ジャンル編集</span>
    </a>
    <a href="{{ route('admin.article.list', ['id' => Auth::id()]) }}" class="navbar-sub">
        <span class="navbar-sub_content">投稿一覧</span>
    </a>
@endsection

@section('content')
    <div class="article_create_container">
        <div class="article_create_left_area">
            <form action="{{ route('admin.article.store') }}" method="post">
                @csrf
                @if(!empty($Article))
                    <input type="hidden" name="article_id" value="{{ $Article }}">
                @endif
                <div class="article_create_genre_area">
                    <div class="article_create_genre_headline">
                        <p>ジャンル</p>
                    </div>
                    <div class="article_create_genre_input">
                        @foreach($genres as $key => $genre)
                            <input type="radio" id="article_create_genre" name="genre" value="{{ $genre->id }}" @if($key === 0) checked="checked" @endif>
                            {{ $genre->name }}
                            <br>
                        @endforeach
                    </div>
                </div>
                <div class="article_create_title_area">
                    <div class="article_create_title_headline">
                        <p>タイトル</p>
                    </div>
                    
                    <div class="article_create_title_input">
                        @error('title')
                            <p class="validate_alert">{{ $message }}</p>
                        @enderror
                        <textarea name="title" rows="1" id="article_create_title_input_form" style="min-height: 26px;">@if(!empty($title)) {{ $title }} @else{{ old('title') }}@endif</textarea>
                    </div>
                </div>
                
                <div class="article_create_tag_area">
                    <div class="article_create_tag_headline">
                        <p>タグ</p>
                    </div>
                    <div class="article_create_tag_input">
                        <input type="text" name="tag" id="article_create_tag_input_form" value="@if(isset($tags_value)) {{ $tags_value }} @else {{ old('tag') }}@endif">
                    </div>
                </div>
                <div class="article_create_article_area">
                    <div class="article_create_article_headline">
                        <p>記事</p>
                    </div>
                    
                    <div class="article_create_article_input">
                        @error('article')
                            <p class="validate_alert">{{ $message }}</p>
                        @enderror
                        <textarea name="article" rows="10" id="article_create_article_input_form" wrap="hard">@if(isset($article)){{ $article }}@else{{ old('article') }}@endif</textarea>
                    </div>
                </div>
                <div class="article_create_submit_area">
                    <button type="submit" id="input_article_submit" name="draft" value="{{ config('const.draft_status.post') }}">投稿する</button>
                    <button type="submit" id="input_article_temporary" name="draft" value="{{ config('const.draft_status.draft') }}" >下書きとして保存</button>
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
                    {{-- insert_js_area --}}
                </div>
            </div>
            <div class="article_view_title_area">
                <div id="article_view_title">
                    {{-- insert_js_area --}}
                </div>
            </div>
            <div class="article_view_tag_area">
                <div id="article_view_tag">
                    {{-- insert_js_area --}}
                </div>
            </div>
            <div class="article_view_article_area">
                <div id="article_view_article">
                    {{-- insert_js_area --}}
                </div>
            </div>
        </div>
    </div>
@endsection