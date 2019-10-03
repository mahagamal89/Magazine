@extends('layouts.admin')
@section('content')
    
<div class="container-fluid">
<div class="row mt-5 col-md-10 offset-md-1">
        
            <div>
                <h1 class="display-4 mb-3">الكتاب</h1>
            </div>
            @if(count($users)>0)
            <table class="table table-striped"">
                <thead>
                <tr>
                    <th>#</th>
                    <th>اسم الكاتب</th>
                    <th>البريد الالكتروني</th>
                    <th>تاريخ التسجيل</th>
                    <th>مشرف\كاتب</th>
                    <th>مسح</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name . ' ' . $user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->day}}/{{$user->created_at->month}}/{{$user->created_at->year}}</td>
                        <td>
                            <form action="{{route('admin.users.update', ['user'=>$user->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="far fa-edit"></i> {{$user->is_admin == 0 ? 'كاتب' : 'مشرف'}} 
                                </button>
                            </form>
                            
                        </td>
                        <td>
                        <form action="{{route('admin.users.destroy', ['user'=>$user->id])}}" method="POST">
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
    </div>

@endsection