@extends('layouts.app')

@section('content')






  
<div class="container-fluid">
    <br>
    <br>
    <div class="row">
<table class="table table-striped">

        @if(count($hotest_articles)>0)
        @foreach ($hotest_articles as $article)
            
     
       
          <tr>
          <td ><a href="/magazines/{{$article->magazine_id}}/articles/{{$article->id}}"><img src="images/{{$article->article_cover}}" style="width:100px;height:70px;">  &nbsp; {{$article->article_title}} </a></td>
              
          </tr>
     
      
       
        @endforeach
        @endif
      </table>
    </div>

</div>
        <div style="min-height:250px"></div>

@endsection