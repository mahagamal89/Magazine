@extends('layouts.app');
@section('content')
    

<div class="py-5">
    <div class="container-fluid">
        <h1 class="display-4">اضف مقالة</h1>
        <form action="{{route('articles.store', ['magazine_id'=>$magazine_id])}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group mb-3">
                <label for="article_title">عنوان المقالة</label>
                <input type="text" name="article_title" class="form-control {{ $errors->has('article_title') ? 'is-invalid' : ''}}">
                <span class="invalid-feedback">عنوان المقالة مطلوب</span>
            </div>
            <div class="form-group mb-3">
                <label for="article_content">المقالة</label>
                <textarea name="article_content" class="form-control {{ $errors->has('article_content') ? 'is-invalid' : ''}}" style="resize:none"></textarea>
                <span class="invalid-feedback">المقالة مطلوبة</span>
            </div>
            <div class="form-group mb-3">
                <label for="cover_path">غلاف المقالة</label>
                <div class="custom-file">
                    <input type="file" name="article_cover" class="custom-file-input  {{ $errors->has('article_cover') ? 'is-invalid' : ''}}">
                    <label for="article_cover" class="custom-file-label"></label>
                    <span class="invalid-feedback">صورة الغلاف مطلوبة بصيغة <span class="text-muted">(.jpg, .jpeg, .png)</span></span>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="category_id">فسم المقالة</label>
                <select name="category_id"  class="form-control {{ $errors->has('category_id') ? 'is-invalid' : ''}}">
                    <option value="0">اختار قسم</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>    
                    @endforeach
                </select>
                <span class="invalid-feedback">قسم المقالة مطلوب</span>
            </div>
            <input type="hidden" name="magazine_id" value="{{$magazine_id}}">
            <input type="hidden" name="channel_id" value="{{$channel_id}}">
            <input type="submit" class="btn btn-primary mt-3" value="اضافة">
        </form>
    </div>
</div>

@endsection