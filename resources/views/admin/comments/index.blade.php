@extends('layouts.admin')
@section('content')
<?php use App\Article; ?>
<div class="container-fluid">
<div class="row mt-5 col-md-10 offset-md-1">
        
            <div>
                <h1 class="display-4 mb-3">التعليقات</h1>
            </div>
            @if(count($comments)>0)
            <table class="table table-striped"">
                <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المقال</th>
                    <th>صاحب التعليق</th>
                    <th>التعليق</th>
                    <th>عدد الردود</th>
                    <th>تفعيل/ايقاف</th>
                    <th>مسح</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->article->article_title}}</td>
                        <td>{{$comment->username}}</td>
                        <td>{{$comment->comment_content}}</td>
                        <td><a {{ count($comment->replies) > 0 ? 'href=/admin/replies/'. $comment->id : '' }}  >{{count($comment->replies)}}</a></td>
                    

                        <td>

                           
                            <form action="/admin/comments/{{$comment->id}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="far fa-edit"></i> {{$comment->is_active == 0 ? 'تفعيل' : 'إقاف'}} 
                                </button>
                            </form>
                            
                        </td>
                        <td>
                        <form action="/admin/comments/{{$comment->id}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> مسح</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

@endsection