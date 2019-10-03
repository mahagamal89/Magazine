@extends('layouts.app')

@section('content')

<div class="py-5 container-fluid">
        <div class="row">
                <div class="col-md-6">
                    <h1 class="mb-3 display-4">جميع الأصدرات</h1>
                </div>
                @if(Auth::check())
                @if (Auth::user()->is_admin == 1)
                <div class="col-md-6 float-left">
                    <a href="{{route('magazines.create')}}" class="btn btn-secondary btn-sm float-left">اضافة اصدار جديد</a>
                </div>
                @endif
            @endif
        </div>
        
            
    <div class="row">
        @if(count($magazines) > 0)
            @foreach ($magazines as $magazine)
            <div class="col-md-3">
                    <div class="row space-2">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="thumbnail">
                                <div class="caption text-center" >
                                    <div class="position-relative">
                                        <a href="{{route('magazines.show', ['magazine'=>$magazine->id])}}">
                                            <img src="/images/{{$magazine->cover_path}}" alt="" class="img-fluid card-img" style="width:200px; height:250px;">
                                        </a> 
                                    </div>
                                    <h4 class="card-title">{{$magazine->magazine_name}}</h4>
                                </div>
                                <div class="caption card-footer text-center">
                                    <ul class="list-inline">
                                        <li><i class="people lighter"></i>&nbsp;تاريخ الإصدار: {{$magazine->created_at->day}}/{{$magazine->created_at->month}}/{{$magazine->created_at->year}}</li>
                                        <li></li>
                                            
                                            <form action="{{ route('pdf.show')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name="id" value="{{$magazine->id}}">
                                                <input type="submit" value="قراءة pdf" class="btn btn-secondary">
                                                </form>    
                                        <i class="glyphicon glyphicon-download lighter"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">&nbsp;</div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<div style="min-height:250px"></div>
    
@endsection