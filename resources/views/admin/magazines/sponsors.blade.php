@extends('layouts.admin')
@section('content')
    
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
                
                <div>
                    <h1 class="display-4 mb-3"> جميع الرعة الحالين للاصدار {{$magazine->magazine_name}}</h1>
                </div>
                @if(count($sponsors)>0)
                
                <table class="table table-striped"">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الراعي</th>
                        <th>عددالاصدرات المدعومة</th>
                        <th>شعار الراعي</th>
                        <th>تعين كارعي للمجالة</th>
    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sponsors as $sponsor)
                    {{-- @if(! $sponsor->magazines->contains($magazine->id)) --}}
                        <tr>
                            <td>{{$sponsor->id}}</td>
                            <td>{{$sponsor->name}}</td>
                            <td>{{count($sponsor->magazines)}}</td>
                            <td><img src="/images/{{$sponsor->logo_path}}" style="height:50px;width:50px" alt=""></td>
                            <td>
                            <form action="{{$sponsor->magazines->contains($magazine->id) ? route('sponsor.detach', ['magazine_id'=>$magazine->id, 'sponsor_id'=>$sponsor->id]) : route('sponsor.attach', ['magazine_id'=>$magazine->id, 'sponsor_id'=>$sponsor->id])}}" method="POST">
                                {{-- <form action="/admin/magazines/{{$magazine->id}}/{{ $sponsor->magazines->contains($magazine->id) ? 'detach': 'attach'}}/{{$sponsor->id}}" method="POST"> --}}
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-times"></i> {{ $sponsor->magazines->contains($magazine->id) ? 'حذف الراعي': 'تعين كارعي'}}</button>
                            </form>
                            </td>
                        </tr>
                        {{-- @endif --}}
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

@endsection