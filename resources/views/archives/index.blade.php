@extends('layouts.app')

@section('content')

<?php use Arabic\Arabic; ?>
<div class="py-5 container-fluid">

            <section class="recent_news_inner">
                <h1 class="category-headding ">جميع مقلات الشهر</h1>
                <div class="headding-border"></div>
                <div class="row">
                    <div id="content-slide" class="owlousel">
                        @if (count($archives) > 0)
                        @foreach ($archives as $archive)
                            
                        <div class="item col-md-6">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s"><!-- image -->
                                <h3><a href="#">{{$archive['article_title']}} </a></h3>
                                <div class="post-thumb">
                                    <a href="{{route('articles.show',['magazine_id'=>$archive['magazine_id'], 'article'=>$archive['id']])}}">
                                        <img class="img-responsive" src="/images/{{$archive['article_cover']}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-title-author-details">
                                <div class="post-editor-date">
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> {{Arabic::since($archive['created_at'])}}
                                    </div>
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> {{count(App\Article::find($archive['id'])->comments)}} </div>
                                </div>
                                <p> {{substr($archive['article_content'], 0, 200)}} <a href="{{route('articles.show',['magazine_id'=>$archive['magazine_id'], 'article'=>$archive['id']])}}">...اقرأ أكثر</a></p>
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