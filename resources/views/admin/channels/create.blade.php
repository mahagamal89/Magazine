@extends('layouts.admin')
@section('content')
    
<div class="container-fluid">
    <h1 class="display-4">اضف مجلة</h1>
<div class="row mt-5 col-md-10 offset-md-1">
    <div class="col-md-8">
        <form action="{{route('admin.channels.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="magazine_name">اسم المجلة</label>
                <input type="text" name="channel_name" class="form-control {{ $errors->has('channel_name') ? 'is-invalid' : ''}}">
                <span class="invalid-feedback">عنوان المجلة مطلوب</span>
            </div>
            <div class="form-group">
                <label for="path">غلاف المجالة</label>
                <div class="custom-file">
                    <input type="file" name="cover_path" class="custom-file-input  {{ $errors->has('cover_path') ? 'is-invalid' : ''}}">
                    <label for="" class="custom-file-label"></label>
                    <span class="invalid-feedback">غلاف المجالة مطلوب</span>
                </div>
            </div>
            <input type="submit" class="btn btn-primary mt-3" value="اضافة المجلة">
        </form>
    </div>        

        </div>
    </div>

@endsection