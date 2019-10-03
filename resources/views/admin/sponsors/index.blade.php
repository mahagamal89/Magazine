@extends('layouts.admin')
@section('content')
<div>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-8">
                    
                    <div>
                        <h1 class="display-4 mb-3">الرعاة</h1>
                    </div>
                    @if(count($sponsors)>0)
                    <table class="table table-striped"">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الراعي</th>
                            <th>عددالاصدرات المدعومة</th>
                            <th>شعار الراعي</th>
                            <th>تعديل</th>
                            <th>مسح</th>
        
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sponsors as $sponsor)
                            <tr>
                                <td>{{$sponsor->id}}</td>
                                <td>{{$sponsor->name}}</td>
                                <td>{{count($sponsor->magazines)}}</td>
                                <td><img src="/images/{{$sponsor->logo_path}}" style="height:50px;width:50px" alt=""></td>
                                <td><a href="{{route('admin.sponsors.edit', ['sponsor'=>$sponsor->id])}}" class="btn btn-secondary">تعديل</a></td>
                                <td>
                                <form action="{{route('admin.sponsors.destroy', ['sponsor'=>$sponsor->id])}}" method="POST">
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
                    <h4>أضاف راعي</h4>
                    <form action="{{route('admin.sponsors.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">أسم الراعي</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
                            <span class="invalid-feedback">اسم الراعي مطلوب<span class="text-muted">(من حرفين الى 25 حرف)</span></span>
                        </div>
                        <div class="form-group">
                                <label for="cover_path">شعار الراعي</label>
                                <div class="custom-file">
                                    <input type="file" name="logo_path" class="custom-file-input  {{ $errors->has('logo_path') ? 'is-invalid' : ''}}">
                                    <label for="logo_path" class="custom-file-label"></label>
                                    <span class="invalid-feedback">صورة شعار الراعي مطلوب بصيغة <span class="text-muted">(.jpg, .jpeg, .png)</span></span>
                                </div>
                        </div>
                        <input type="submit" value="أضافة الراعي" class="btn btn-info">
                    </form>
                </div>
            </div>
        </div>
</div>    

@endsection