@extends('layouts.app')

@section('content')
<?php use Arabic\Arabic; ?>
<div class="container py-4">
    <div class="row">
   
        <div class="col-md-9 col-sm-9">
                <img src="/images/{{$article->article_cover}}" alt="" class="img-fluid text-center article-img">
           <h1 class="display-4">{{$article->article_title}}</h1>
       {{-- <h4> بواسطة: <span style="color:red"> {{$article->user_id == 0 ? 'مجهول' : $article->user->first_name . ' ' . $article->user->last_name}} </span> -- {{$article->created_at->month}} {{$article->created_at->day}},{{$article->created_at->year}}<br> --}}
        <div class="date">
                <ul>
                    <li><h6>بواسطة<span style="color:red;"> {{$article->user_id == 0 ? 'مجهول' : $article->user->first_name . ' ' . $article->user->last_name}}</span>--</h6></li>
                    <li><h6>{{$article->created_at->day}}/{{$article->created_at->month}}/{{$article->created_at->year}} --</h6></li>
                    <li><h6><span style="color:red;">{{count($comments)}} تعليقات</span></h6></li>
                </ul>
            </div>



        @if (count($article->photos) > 0)
                <div class="row mt-3">
                 
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                               
                                <div class="carousel-inner">
                                        @foreach ($article->photos as $index => $photo)
                                        @if($index==1)
                                  <div class="carousel-item active">
                                    <img height="327" width="197" class="d-block w-100" src="/images/{{$photo->path}}" alt="First slide">
                                  </div>
                                  @else 
                                  <div class="carousel-item ">
                                        <img height="327" width="197" class="d-block w-100" src="/images/{{$photo->path}}" alt="First slide">
                                      </div>
                                      @endif
                                  @endforeach
                                    </div>
                                   
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                  
                </div>
            @endif

            <br><br>
            <p class="col-md-12" style="white-space:pre-line; ">{{ $article->article_content}}</p>
        </div>
        
        <div class="col-md-3 col-sm-3 right-padding">
                <aside>
        <h2 class="category-headding ">الرعاة</h2>
        <div class="headding-border"></div>
    @if (count($sponsors) > 0)
    @foreach ($sponsors as $sponsor)
    <div class="item sponsor-item mb-1">
        <div class="post-wrapper wow fadeIn" data-wow-duration="1s"><!-- image -->
            <div class="post-thumb">
                <img class="img-responsive" src="/images/{{$sponsor->logo_path}}" alt="">
            </div>
        </div>
    </div>
        
    @endforeach
    @endif
                </aside>
</div>

    </div>



    {{-- ADD Comment Section --}}
    <div class="row">
        <div class="col-md-8">
    <div class="form-area">
            <h3 class="category-headding ">ترك تعليق</h3>
            <div class="headding-border"></div>
            <form method="POST" action="/articles/{{$article->id}}/comments">
                {{ csrf_field() }}
                <div class="row">
                        @if(Auth::check())
                        <div class="col-sm-6">
                            <span class="input">
                                <input class="input_field" name="username" type="hidden" value="{{Auth::user()->first_name }} {{Auth::user()->last_name }}" id="input-1" required>
                                <label class="align-center input_label" for="input-1">{{Auth::user()->first_name }} {{Auth::user()->last_name }} </label>
                                   <span class="input_label_content" data-content="اسمك"></span>
                                </label>
                            </span>
                        </div>
                        <div class="col-sm-6">
                                <span class="input">
                                        <input class="input_field" name="email" type="hidden" value="{{Auth::user()->email }} " id="input-1" required>
                                        <label class="align-center input_label" for="input-2">{{Auth::user()->email }} </label>
                                    <span class="input_label_content" data-content="بريدك الالكتروني"> </span>
                                    </label>
                                </span>
                            </div>
                            <br><br><br>
                    @else
                    <div class="col-sm-6">
                        <span class="input">
                            <input class="input_field" name="username" type="text" id="input-1" required>
                            <label class="input_label" for="input-1">
                                <span class="input_label_content" data-content="اسمك">اسمك</span>
                            </label>
                        </span>
                    </div>
                  
                    <div class="col-sm-6">
                        <span class="input">
                            <input class="input_field" name="email" type="email" id="input-2" required>
                            <label class="input_label" for="input-2">
                                <span class="input_label_content" data-content="بريدك الالكتروني">بريدك الالكتروني</span>
                            </label>
                        </span>
                    </div>
                    @endif
                    <div class="col-sm-12">
                        <span class="input">
                            <textarea class="input_field" name="comment_content" id="message" required></textarea>
                            <label class="input_label" for="message">
                                <span class="input_label_content" data-content="رسالتك">رسالتك</span>
                            </label>
                        </span>
                        <input type="submit" class="btn btn-style" value="أضف تعليق">
                    </div>
                </div>
            </form>
        </div>
  
    </div>
</div>



     {{-- FETCH COMMENT --}}
    <div class="row">
            <div class="col-md-8">
    <div class="comments-container-fluid">
        <h3>التعليق </h3>
        <div class="headding-border"></div>
        @foreach($comments as $comment)
        <ul id="comments-list" class="comments-list">
            <li>
                <div class="comment-main-level">
                    <!-- Avatar -->
                    <div class="comment-avatar"><img src="/images/{{$comment->img_path}} "style="border-radius: 50%;" alt=""></div>
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                        <div class="comment-head">
                           
                            <h6 class="comment-name"> {{  $comment->username }}</h6>
                         
                         
                            <span>   {{'منذ '.Arabic::since($comment->created_at->diffforHumans() )}}</span>
                            <div class="accordion" id="accordionExample">
                            <i >
                                    <button class="btn btn-link fa fa-reply collapsed" type="button" data-toggle="collapse" data-target="#collapseOne{{$comment->id}}" aria-expanded="false" aria-controls="collapseOne">
                                            
                                          </button>
                                </i>
                            
                            </div>
                        </div>
                        <div class="comment-content">
                                {{  $comment->comment_content }} 
                        </div>
                    </div>
                </div>


   

                       {{-- ADD REPLY  --}}
                        <div id="collapseOne{{$comment->id}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                        <div class="row"  style="margin-right:50px; ">
                                                <div class="col-md-8">
                                            <div class="form-area">
                                                    <h3 class="category-headding ">ترك رد</h3>
                                                    <div class="headding-border"></div>
                                                    <form method="POST" action="/comments/{{$comment->id}}/replies">
                                                        {{ csrf_field() }}
                                                        <div class="row">
                                                                @if(Auth::check())
                                                                <div class="col-sm-6">
                                                                    <span class="input">
                                                                        <input class="input_field" name="username" type="hidden" value="{{Auth::user()->first_name }} {{Auth::user()->last_name }}" id="input-1" required>
                                                                        <label class="align-center input_label" for="input-1">{{Auth::user()->first_name }} {{Auth::user()->last_name }} </label>
                                                                           <span class="input_label_content" data-content="اسمك"></span>
                                                                        </label>
                                                                    </span>
                                                                </div>
                                                           
                                                                    <br><br><br>
                                                            @else
                                                            <div class="col-sm-6">
                                                                <span class="input">
                                                                    <input class="input_field" name="username" type="text" id="input-1" required>
                                                                    <label class="input_label" for="input-1">
                                                                        <span class="input_label_content" data-content="اسمك">اسمك</span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                          
                                                      
                                                            @endif
                                                            <div class="col-sm-12">
                                                                <span class="input">
                                                                    <textarea class="input_field" name="reply_content" id="message" required></textarea>
                                                                    <label class="input_label" for="message">
                                                                        <span class="input_label_content" data-content="رسالتك">رسالتك</span>
                                                                    </label>
                                                                </span>
                                                                <input type="submit" class="btn btn-style" value="أضف الرد">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                          
                                            </div>
                                        </div> 
                                     </div>
                              </div>
                            {{-- END OF ADD REPLY --}}

        


                <!--FETCH REPLY -->
             
                        @foreach ($comment->replies as $reply)
                        @if(count($comment->replies)>0 && $reply->is_active == 1)
                        <ul class="comments-list reply-list">
                    <li>
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="/images/{{$reply->img_path}} " style="border-radius:50%;" alt=""></div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                             
                                <h6 class="comment-name"><a href="#"> {{  $reply->username }}</a></h6>
                              
                                <span>{{'منذ '.Arabic::since($reply->created_at->diffforHumans() )}}</span>
                              
                            </div>
                            <div class="comment-content">
                                    {{  $reply->reply_content }} 

                            </div>
                        </div>
                    </li>
         
           
                </ul>
                @endif
                @endforeach
            </li>
  
        </ul>
        @endforeach
    </div>
            </div>
    </div>


</div>
    
@endsection