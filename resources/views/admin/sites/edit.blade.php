@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="display-4">تعديل الموقع</h1>
        <div class="mt-3">
                <form action="{{route('admin.sites.update', ['site'=>$site->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">أسم الموقع</label>
                        <input type="text" name="title" value="{{$site->title}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
                        <span class="invalid-feedback">اسم الموقع مطلوب<span class="text-muted">(من حرفين الى 25 حرف)</span></span>
                    </div>
                    <div class="form-group">
                        <label for="name">عنوان الموقع</label>
                        <input type="text" name="link" value="{{$site->link}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
                        <span class="invalid-feedback">عنوان الموقع مطلوب<span class="text-muted">(من حرفين الى 25 حرف)</span></span>
                    </div>
                    <div class="form-group">
                        <label for="cover_path">تغيير شعار الموقع(اختياري)</label>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/images/{{$site->logo_path}}" style="height:100px; width:100px" alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" name="logo_path" class="custom-file-input">
                                    <label for="logo_path" class="custom-file-label"></label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="تعديل" class="btn btn-secondary">
                        </div>
                </form>
            </div>
        </div>
    </div>    
@endsection