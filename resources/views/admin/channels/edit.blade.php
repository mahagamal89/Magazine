@extends('layouts.admin')
@section('content')
    
<div class="container-fluid">
    <h1 class="display-4">تعديل المجلة</h1>
<div class="row mt-5 col-md-10 offset-md-1">
    <div class="col-md-8">
        <form action="{{route('admin.channels.update', ['channel'=> $channel->id])}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="channel_name">اسم المجلة</label>
                <input type="text" name="channel_name" value="{{$channel->channel_name}}"  class="form-control {{ $errors->has('channel_name') ? 'is-invalid' : ''}}">
                <span class="invalid-feedback">عنوان المجلة مطلوب</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="path">غلاف المجالة(اختياري)</label>
                        <div class="custom-file">
                            <input type="file" name="cover_path" class="custom-file-input">
                            <label for="" class="custom-file-label"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="/images/{{$channel->cover_path}}" height="100" width="100">
                </div>
            </div>
            <input type="submit" class="btn btn-primary mt-3" value="تعديل المجلة">
        </form>
    </div>        

        </div>
    </div>

@endsection