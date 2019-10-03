@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-9">
        <div class="card">
        <div class="card-header clearfix">
            <div class="float-right">
            <h4>جميع المقلات</h4>
            </div>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>العنوان</th>
                <th>القسم</th>
                <th>التاريخ</th>
                <th>تفعيل/ايقاف</th>
                <th>تعديل و تعين مجلة</th>
                <th>مسح</th>
            </tr>
            </thead>
            <tbody>
            @if(count($articles) > 0)
            @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td><a href="{{route('articles.show', ['magazine_id'=>$article->magazine_id, 'article'=>$article->id])}}">{{$article->article_title}}</a></td>
                <td>{{$article->category->category_name}}</td>
                <td>{{$article->created_at->day}}/{{$article->created_at->month}}/{{$article->created_at->year}}</td>
                
                <td>
    
                        
                    <form action="{{route('admin.articles.activation', ['magazine_id'=>$article->magazine_id, 'article'=>$article->id])}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit" class="btn btn-warning">
                            <i class="far fa-edit"></i> {{$article->is_active == 0 ? 'تفعيل' : 'إقاف'}} 
                        </button>
                    </form>
                    
                </td>
                <td><a href="{{route('admin.articles.edit', ['article'=>$article->id])}}" class="btn btn-secondary">تعديل و تعين مجلة</a></td>
                
                <td>     
                    <form action="{{route('admin.articles.destroy', ['article'=>$article->id])}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">
                            <i class="far fa-edit"></i> مسح 
                        </button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection