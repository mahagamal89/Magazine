@extends('layouts.app')

@section('content')






  

        <div class="container-fluid">
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="category-headding">الرعاة :</h1>
                        <div class="headding-border"></div>
                    </div>
            
                </div>
                <div class="row">
                        @if(count($sponsors) > 0)
                    @foreach ($sponsors as $sponsor)                  
                    <div class="col-md-3">
                        <div class="row space-16">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="thumbnail">
                                    <div class="caption text-center" >
                                        <div class="position-relative">
                                            <img src="/images/{{$sponsor->logo_path}}" style="width:176px; height:200px;">
                                        </div>
                                       <p> </p>
                                    </div>
                                    <div class="caption card-footer text-center">
                                        <ul class="list-inline">
                                                <li><i class="glyphicon glyphicon-user light-red lighter bigger-120"></i>&nbsp;  {{$sponsor->name}}</li>
                                                <li></li>
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