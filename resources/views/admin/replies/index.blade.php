@extends('layouts.admin')
@section('content')
<?php use App\Article; ?>
<div class="container-fluid">
<div class="row mt-5 col-md-10 offset-md-1">
        
            <div>
                <h1 class="display-4 mb-3">الردود</h1>
            </div>
          
            <table class="table table-striped"">
                <thead>
                <tr>
                    <th>#</th>
                    <th>صاحب الرد</th>
                    <th>الرد</th>
                    <th>تفعيل/ايقاف</th>
                    <th>مسح</th>

                </tr>
                </thead>
                <tbody>
                    @if(count($replies)>0)
                @foreach ($replies as $reply)
                    <tr>
                        <td>{{$reply->id}}</td>
                       <td>{{$reply->username}}</td>
                        <td>{{$reply->reply_content}}</td>
                    

                        <td>

                           
                            <form action="{{route('admin.replies.update', ['reply'=>$reply->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="far fa-edit"></i> {{$reply->is_active == 0 ? 'تفعيل' : 'إقاف'}} 
                                </button>
                            </form>
                            
                        </td>
                        <td>
                        <form action="{{route('admin.replies.destroy', ['reply'=>$reply->id])}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> مسح</button>
                        </form>
                        </td>
                    </tr>
                  
                @endforeach
                @endif
                </tbody>
            </table>
        
        </div>
    </div>

@endsection