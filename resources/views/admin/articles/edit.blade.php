@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="display-4">تعديل المقالة</h1>
        <div class="mt-3">
                <form action="{{route('admin.articles.update', ['article'=>$article->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">أسم المقالة</label>
                        <input type="text" name="article_title" value="{{$article->article_title}}" class="form-control {{ $errors->has('article_title') ? 'is-invalid' : ''}}">
                        <span class="invalid-feedback">اسم المقالة مطلوب<span class="text-muted">(من حرفين الى 25 حرف)</span></span>
                    </div>
                    <div class="form-group">
                            <label for="name">تعين مجالة</label>
                            <select name="magazine_id" class="form-control {{ $errors->has('magazine_id') ? 'is-invalid' : ''}}">
                                @foreach ($magazines as $magazine)
                                    <option value="{{$magazine->id}}">{{$magazine->magazine_name}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback">المجالة مطلوب</span>
                    </div>
                    <div class="form-group">
                        <label for="name">محتوى المقالة</label>
                        <textarea name="article_content"  class="form-control {{ $errors->has('article_content') ? 'is-invalid' : ''}}">{{$article->article_content}}</textarea>
                        <span class="invalid-feedback">محتوى المقالة مطلوب<span class="text-muted">(من حرفين الى 25 حرف)</span></span>
                    </div>
                    <div class="form-group">
                        <label for="cover_path">تغيير غلاف المقالة(اختياري)</label>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/images/{{$article->article_cover}}" style="height:100px; width:100px" alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" name="article_cover" class="custom-file-input">
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