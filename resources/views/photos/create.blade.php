@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 500px">
    <div class="row mt-5">
        <div class="col-md-6">
            <h1 class="display-4">اضافة صور للمقال<small class="text-muted">(اختياري)</small></h1>
        </div>
        <div class="col-md-6 clearfix">
            <button class="btn btn-secondary  float-left" id="addPhotoBtn">اضف صورة اخرى</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <form action="{{route('photos.store', ['article_id'=>$article_id])}}" method="POST" id="photos-form" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="cover_path">اضف صورة</label>
                    <div class="custom-file">
                        <input type="file" name="path" class="custom-file-input  {{ $errors->has('path') ? 'is-invalid' : ''}}">
                        <label for="" class="custom-file-label"></label>
                        <span class="invalid-feedback">الصورة مطلوبة بصيغة <span class="text-muted">(.jpg, .jpeg, .png)</span></span>
                    </div>
                </div>
                
                
                
                        <input type="submit" value="اضف الصور" class="btn btn-primary">
                        <a href="{{route('home')}}" class="btn btn-dark float-left">التالي</a>
                        
                    </form>
                </div>
    </div>
</div>


    
@endsection