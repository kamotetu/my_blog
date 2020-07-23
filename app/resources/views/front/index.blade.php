@extends('layouts.front')

@section('content')
    @include('header.header')
    <div class="index_container">
        <img src="{{ asset('images/back_image3.jpg') }}" alt="かもてつ日記" class="index_back_image_area">
        <div class="left_side_content">
            <div class="index_left_side_content_icon_area">
                <i class="fas fa-align-justify"></i>
                <i class="fas fa-angle-left"></i>
            </div>
        </div>
        <div class="index_article_container">
            <div class="index_top_title">
                <h2 class="index_near_article">
                    最近の記事
                </h2>
            </div>
            <div class="index_article_content">
                <a href="">
                    <div class="index_title_area">
                        <h5>
                            タイトル
                        </h5>
                    </div>

                    <div class="index_article_area">
                        記事記事記事記事記事記事記事記事記事記事記事記事記事記事記事
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection