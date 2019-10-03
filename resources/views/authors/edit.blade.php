@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- <h1>المعلومات الشخصية</h1>
  	<hr> --}}
	<div class="row no-gutters py-5">
      <!-- left column -->
      <div class="col-md-12">
      <h3>المعلومات الشخصية</h3>
      <hr> 
      </div>
      <form class="form-horizontal" action="{{route('authors.update', ['author'=>$user->id])}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
      <div class="col-md-3">
     
           
                    <div class="text-center">
                            <img class="img-responsive img-fluid w-75 rounded-circle float-left" src="/images/{{$user->img_path ? $user->img_path : 'user.png'}}" alt="">     
                      
                      <input type="file" class="form-control" name="img_path">
                    </div>
                
                  
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
      
      

                <div class="form-group">
                        <label class="col-lg-3 control-label">الاسم الاول:</label>
                        <div class="col-lg-8" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="first_name" value="{{$user->first_name}}">
                        </div>
                      </div>
                      <div class="form-group">
                            <label class="col-lg-3 control-label">اسم العائلة :</label>
                            <div class="col-lg-8" style="padding-bottom: 10px;">
                                    <input class="form-control" type="text" name="last_name" value="{{$user->last_name}} ">
                                </div>
                          </div>

          <br>
          <div class="form-group">
            <label class="col-lg-3 control-label">رقم الهاتف:</label>
            <div class="col-lg-8" style="padding-bottom: 10px;">
                    <input class="form-control" type="text" name="mobile_number" value="{{$user->mobile_number}} ">
                </div>
          </div>
          <br>
          <div class="form-group">
            <label class="col-lg-3 control-label">رقم هاتف اضافى :</label>
            <div class="col-lg-8" style="padding-bottom: 10px;">
                    <input class="form-control" type="text" name="additional_number" value="{{$user->additional_number}} ">
                </div>
          </div>
   
     <br>
  
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                    <input type="submit" class="btn btn-primary" value="حفظ">
             <a href="{{route('profile')}}" class="btn btn-dark">الغاء</a>

            </div>
          </div>
      </div>
    </form>
  </div>
</div>
<hr>

<div style="min-height:250px"></div>

@endsection