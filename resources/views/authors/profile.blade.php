@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- <h1>المعلومات الشخصية</h1>
  	<hr> --}}
	<div class="row no-gutters">
      <!-- left column -->
      <div class="col-md-12 py-5">
      <h3>المعلومات الشخصية</h3>
      <hr> 
      </div>
      <div class="col-md-3">
     
      <img class="img-responsive img-fluid w-75 rounded-circle float-left" src="/images/{{$user->img_path ? $user->img_path : 'user.png'}}" alt="">     
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
      
      
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">الاسم الاول:</label>
            <div class="col-lg-8" style="padding-bottom: 10px;">
                    <p class="lead">{{$user->first_name}}&nbsp; </p>
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-3 control-label">اسم العائلة :</label>
                <div class="col-lg-8" style="padding-bottom: 10px;">
                        <p class="lead">{{$user->last_name}}&nbsp; </p>
                </div>
              </div>
          <div class="form-group">
                <label class="col-lg-3 control-label">الايميل :</label>
                <div class="col-lg-8" style="padding-bottom: 10px;">
                        <p class="lead">{{$user->email}}&nbsp; </p>
                </div>
              </div>
          <br>
          <div class="form-group">
            <label class="col-lg-3 control-label">رقم الهاتف:</label>
            <div class="col-lg-8" style="padding-bottom: 10px;">
                    <p class="lead">{{$user->mobile_number}}&nbsp; </p>
            </div>
          </div>

          <br>
          <div class="form-group">
            <label class="col-lg-3 control-label">رقم هاتف اضافى :</label>
            <div class="col-lg-8" style="padding-bottom: 10px;">
             <p class="lead">{{$user->additional_number}}&nbsp; </p>
            </div>
          </div>
   
     <br>
  
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
             <a href="{{route('authors.edit', ['author'=>$user->id])}}" class="btn btn-secondary">تغيير البيانات</a> 
            
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

<div style="min-height:250px"></div>

@endsection