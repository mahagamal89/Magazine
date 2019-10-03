@extends('layouts.admin')
@section('content')
<div>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-8">
                    
                    <div>
                        <h1 class="display-4 mb-3">المواقع :</h1>
                    </div>
                    @if(count($sites)>0)
                    <table class="table table-striped"">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الموقع</th>
                            <th>عنوان الموقع</th>
                            <th>شعار الراعي</th>
                            <th>تعديل</th>
                            <th>مسح</th>
        
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sites as $site)
                            <tr>
                                <td>{{$site->id}}</td>
                                <td>{{$site->title}}</td>
                                <td><a href="http://{{$site->link}}">{{$site->link}}</a></td>
                                <td><img src="/images/{{$site->logo_path}}" style="height:50px;width:50px" alt=""></td>
                                <td><a href="{{route('admin.sites.edit', ['site'=>$site->id])}}" class="btn btn-secondary">تعديل</a></td>
                                <td>
                                <form action="{{route('admin.sites.destroy', ['site'=>$site->id])}}" method="POST">
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
                <div class="col-md-4" v-if="!edit">
                    <h4>أضاف موقع</h4>
                    <form action="{{route('admin.sites.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">أسم الموقع</label>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" required>
                            <span class="invalid-feedback">اسم الموقع مطلوب<span class="text-muted">(من حرفين الى 25 حرف)</span></span>
                        </div>
                        <div class="form-group">
                            <label for="name">عنوان الموقع</label>
                            <input type="text" name="link" class="form-control {{ $errors->has('link') ? 'is-invalid' : ''}}" required>
                            <span class="invalid-feedback">عنوان الموقع مطلوب<span class="text-muted">(من حرفين الى 25 حرف)</span></span>
                        </div>
                        <div class="form-group">
                                <label for="cover_path">شعار الموقع</label>
                                <div class="custom-file">
                                    <input type="file" name="logo_path" class="custom-file-input  {{ $errors->has('logo_path') ? 'is-invalid' : ''}}" required>
                                    <label for="logo_path" class="custom-file-label"></label>
                                    <span class="invalid-feedback">صورة شعار الموقع مطلوب بصيغة <span class="text-muted">(.jpg, .jpeg, .png)</span></span>
                                </div>
                        </div>
                        <input type="submit" value="أضافة الموقع" class="btn btn-info">
                    </form>
                </div>
            </div>
        </div>
</div>    

@endsection