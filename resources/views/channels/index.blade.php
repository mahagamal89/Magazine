@extends('layouts.app')

@section('content')






        <div class="container-fluid">
                <br>
                <br>
                
                <div class="row">
                        <div class="col-md-6">
                            <h1 class="mb-3 display-4 ">جميع المجلات</h1>
                            <div class="headding-border"></div>

                        </div>
                        <div class="col-md-6 clearfix">
                            @if(Auth::check())
                                @if (Auth::user()->is_admin == 1)
                                    <a href="{{route('channels.create')}}" class="btn btn-secondary btn-sm float-left">اضافة مجلة جديد</a>
                                @endif
                            @endif
                            </div>
                </div>
                <div class="row">
                        @if(count($channels) > 0)
                        @foreach ($channels as $channel)
                    <div class="col-md-6">
                        <div class="row space-16">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="thumbnail">
                                    <div class="caption text-center" >
                                        <div class="position-relative">
                                            <a href="{{route('channels.show', ['id' => $channel->id])}}">
                                                    <img src="/images/{{$channel->cover_path}}" alt="" class="img-fluid card-img" style="height: 200px;width:175px;">
                                            </a> 
                                        </div>
                                        <h3 class="card-title">{{$channel->channel_name}}</h3>
                                        
                                        
                                    </div>
                                    <div class="caption card-footer text-center">
                                        <ul class="list-inline">
                                            <li><i class="people lighter"></i>&nbsp;تاريخ الإصدار: {{$channel->created_at->day}}/{{$channel->created_at->month}}/{{$channel->created_at->year}}</li>
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