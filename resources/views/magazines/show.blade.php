@extends('layouts.app')

@section('content')
<?php use Arabic\Arabic; ?>
<div class="py-5 container-fluid">

            <section class="recent_news_inner">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="category-headding ">جميع مقلات الاصدار</h1>
                        <div class="headding-border"></div>
                    </div>
                    <div class="col-md-6 text-left">
                        @if(Auth::check())
                            <a href="{{route('articles.create', ['magazine_id'=>$magazine->id])}}" class="btn btn-secondary btn-sm">اضافة مقالة</a>
                        @endif
                    </div>
                </div>

                <div class="row">
                    

                    <div id="content-slide" class="owlousel">
                        @if (count($articles) > 0)
                        @foreach ($articles as $article)
                            
                        <div class="item col-md-6">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s"><!-- image -->
                                <h3><a href="#">{{$article['article_title']}} </a></h3>
                                <div class="post-thumb">
                                    <a href="{{route('articles.show',['magazine_id'=>$article['magazine_id'], 'article'=>$article['id']])}}">
                                        <img class="img-responsive" src="/images/{{$article['article_cover']}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-title-author-details">
                                <div class="post-editor-date">
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> {{Arabic::since($article['created_at'])}}
                                    </div>
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> {{count(App\Article::find($article['id'])->comments)}} </div>
                                </div>
                                <p> {{substr($article['article_content'], 0, 200)}} <a href="{{route('articles.show',['magazine_id'=>$article['magazine_id'], 'article'=>$article['id']])}}">...اقرأ أكثر</a></p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                            
                    </div>
                </div>
            </section>
            <div style="min-height:250px"></div>
        </div>






@endsection