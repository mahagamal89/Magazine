@extends('layouts.admin')
@section('content')
    
<div class="container-fluid">
<div class="row mt-5 col-md-10 offset-md-1">
        
            <div>
                <h1 class="display-4 mb-3">المجالات</h1>
            </div>
            <div class=" mr-auto">
                <a href="{{route('admin.channels.create')}}" class="btn btn-primary btn-sm">اضفة مجالة</a>
            </div>
            @if(count($channels)>0)
            <table class="table table-striped"">
                <thead>
                <tr>
                    <th>#</th>
                    <th>غلاف المجالة</th>
                    <th>اسم المجالة</th>
                    <th>عدد الاصدرات</th>
                    <th>تعديل المجلة</th>
                    <th>تفعيل/ايقاف</th>
                    <th>مسح</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($channels as $channel)
                    <tr>
                        <td>{{$channel->id}}</td>
                        <td><img src="/images/{{$channel->cover_path}}" style="height:50px" class="img-fluid"></td>
                        <td><a href="{{route('channels.show', ['channel'=> $channel->id])}}">{{$channel->channel_name}}</a></td>
                        <td>{{count($channel->magazines)}}</td>
                        <td><a href="{{route('admin.channels.edit', ['channel'=>$channel->id])}}" class="btn btn-secondary">تعديل المجلة</a></td>
                        <td>

                           
                            <form action="{{route('admin.channels.activation', ['id'=>$channel->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-warning">
                                    <i class="far fa-edit"></i> {{$channel->is_active == 0 ? 'تفعيل' : 'إقاف'}} 
                                </button>
                            </form>
                            
                        </td>
                        <td>
                        <form action="{{route('admin.channels.destroy', ['channel'=>$channel->id])}}" method="POST">
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