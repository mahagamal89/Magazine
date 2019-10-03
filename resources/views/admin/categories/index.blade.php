@extends('layouts.admin')
@section('content') 
<div class="container-fluid">
        @include('includes.messages')
    <div class="row mt-5">
        <div class="col-md-8">
                
                <div>
                    <h1 class="display-4 mb-3">الاقسام</h1>
                </div>
                @if(count($categories)>0)
                <table class="table table-striped"">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم القسم</th>
                        <th>عددالمقلات في القسم</th>
                        <th>مسح</th>
    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{count($category->articles)}}</td>
                            <td>
                            <form action="/admin/categories/{{$category->id}}" method="POST">
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
            <div class="col-md-4">
                <h4>أضاف قسم</h4>
                <form action="/admin/categories" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="category_name">أسم القسم</label>
                        <input type="text" name="category_name" class="form-control {{ $errors->has('category_name') ? 'is-invalid' : ''}}">
                        <span class="invalid-feedback">اسم القسم مطلوب<span class="text-muted">(من حرفين الى 25 حرف)</span></span>
                    </div>
                    <input type="submit" value="أضافة القسم" class="btn btn-info">
                </form>
            </div>
        </div>
    </div>

@endsection