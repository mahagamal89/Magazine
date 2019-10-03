@extends('layouts.app');
@section('content')
    

<div class="py-5">
    <div class="container-fluid">
        <h1 class="display-4">اضف إصدار</h1>
        <form action="{{route('magazines.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group mb-3">
                <label for="magazine_name">عنوان الاصدار</label>
                <input type="text" name="magazine_name" class="form-control {{ $errors->has('magazine_name') ? 'is-invalid' : ''}}">
                <span class="invalid-feedback">عنوان الاصدار مطلوب</span>
            </div>
            <div class="form-group mb-3">
                <label for="pdf_path">رفع المجلة بسيغة PDF</label>
                <div class="custom-file">
                    <input type="file" name="pdf_path" class="custom-file-input  {{ $errors->has('pdf_path') ? 'is-invalid' : ''}}">
                    <label for="" class="custom-file-label"></label>
                    <span class="invalid-feedback"> المجلة لالكترونية مطلوبة بصيغة  <span class="text-muted">(.jpg,.jpeg, .png, .pdf)</span></span>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="cover_path">غلاف المجلة</label>
                <div class="custom-file">
                    <input type="file" name="cover_path" class="custom-file-input  {{ $errors->has('cover_path') ? 'is-invalid' : ''}}">
                    <label for="" class="custom-file-label"></label>
                    <span class="invalid-feedback">صورة الغلاف مطلوبة بصيغة <span class="text-muted">(.jpg, .jpeg, .png)</span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="date">تاريخ الاصدار</label>
                <input type="date" value="{{date("Y-m-d")}}" name="created_at" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="اضافة">
        </form>
    </div>
</div>

@endsection