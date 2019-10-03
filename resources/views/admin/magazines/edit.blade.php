@extends('layouts.admin')
@section('content')
    
<div class="container-fluid">
    <h1 class="display-4">تعديل الاصدار</h1>
<div class="row mt-5 col-md-10 offset-md-1">
    <div class="col-md-12">
        <form action="{{route('admin.magazines.update', ['magazine'=>$magazine->id])}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="magazine_name">عنوان الاصدار</label>
                <input type="text" name="magazine_name" value="{{$magazine->magazine_name}}" class="form-control {{ $errors->has('magazine_name') ? 'is-invalid' : ''}}">
                <span class="invalid-feedback">عنوان الاصدار مطلوب</span>
            </div>
            <div class="form-group">
                <label for="path">PDF تعديل الاصدار</label>
                <div class="custom-file">
                    <input type="file" name="pdf_path" class="custom-file-input  {{ $errors->has('pdf_path') ? 'is-invalid' : ''}}">
                    <label for="" class="custom-file-label"></label>
                    <span class="invalid-feedback">المجالة مطلوبة PDF</span>
                </div>
            </div>
            <div class="form-group">
                <label for="path">تعديل غلاف الاصدار</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="custom-file">
                            <input type="file" name="cover_path" class="custom-file-input  {{ $errors->has('cover_path') ? 'is-invalid' : ''}}">
                            <label for="" class="custom-file-label"></label>
                            <span class="invalid-feedback">غلاف الاصدار مطلوب</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="/images/{{$magazine->cover_path}}" height="200" width="200" alt="">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-secondary mt-3" value="تعديل الاصدار">
        </form>
    </div>        

        </div>
    </div>

@endsection