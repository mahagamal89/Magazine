@extends('layouts.admin')

@section('content')
 

  <!-- POSTS -->
  <section id="posts">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header clearfix">
              <div class="float-right">
                <h4>المقلات الاحدث</h4>
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
                  <th>تعديل و تعين اصدار</th>
                  <th>مسح</th>
                </tr>
              </thead>
              <tbody>
                @if(count($articles) > 0)
                @foreach($articles as $article)
                <tr>
                  <td>{{$article->id}}</td>
                  <td><a href="{{route('articles.show', ['magazine_id'=>$article->magazine_id, 'article'=>$article->id])}}">{{$article->article_title}}</a></td>
                  <td>القسم</td>
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
                    <td><a href="{{route('admin.articles.edit', ['article'=>$article->id])}}" class="btn btn-secondary">تعديل و تعين اصدار</a></td>
                 
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
        <div class="col-md-3">

          <div class="card text-center bg-success text-white mb-3">
            <div class="card-body">
              <h3>عدد الاصدرات</h3>
              <h5>
                <i class="fas fa-folder"></i> {{$magazines->count()}}
              </h4>
              <a href="{{route('admin.magazines.index')}}" class="btn btn-outline-light btn-sm">عرض</a>
            </div>
          </div>

          <div class="card text-center bg-warning text-white mb-3">
            <div class="card-body">
              <h3>عدد الكتاب</h3>
              <h5>
                <i class="fas fa-users"></i> {{$users->count()}}
              </h4>
              <a href="{{route('admin.users.index')}}" class="btn btn-outline-light btn-sm">عرض</a>
            </div>
          </div>

          <div class="card text-center bg-info text-white mb-3">
            <div class="card-body">
              <h3>عدد المقلات</h3>
              <h5>
                <i class="fas fa-users"></i> {{$articles->count()}}
              </h4>
              <a href="{{route('admin.articles.index')}}" class="btn btn-outline-light btn-sm">عرض</a>
            </div>
          </div>

            <div class="card text-center bg-danger text-white mb-3">
              <div class="card-body">
                <h3>عدد التعليقات</h3>
                <h5>
                  <i class="fas fa-users"></i> {{$comments->count()}}
                </h4>
                <a href="{{route('admin.comments.index')}}" class="btn btn-outline-light btn-sm">عرض</a>
              </div>
            </div>

            
            <div class="card text-center bg-secondary text-white mb-3">
              <div class="card-body">
                <h3>عدد الرعاة</h3>
                <h5>
                  <i class="fas fa-users"></i> {{$sponsors->count()}}
                </h4>
                <a href="{{route('admin.sponsors.index')}}" class="btn btn-outline-light btn-sm">عرض</a>
              </div>
            </div>


        </div>
      </div>
    </div>
  </section>

     <!-- FOOTER -->
     <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <p class="lead text-center">
                Copyright &copy;
                <span id="year"></span>
                Blogen
              </p>
            </div>
          </div>
        </div>
      </footer>


@endsection
