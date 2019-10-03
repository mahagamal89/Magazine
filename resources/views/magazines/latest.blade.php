@extends('layouts.app')

@section('content')






  

        <div class="container-fluid">
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="category-headding">كلمة العدد :</h1>
                        <div class="headding-border"></div>
                    </div>
            
                </div>
                <div class="row">
                                 
                    <div class="col-md-6">
                        <div class="row space-16">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="thumbnail">
                                    <div class="caption text-center" >
                                        <div class="position-relative">
                                            {{-- <img src="/images/{{$magazine->img_path}}" style="width:176px;height:235px;"> --}}
                                        </div>
                                    <p><i class="glyphicon glyphicon-user light-red lighter bigger-120" ></i> اللاصدار الحالى: <span style=" font-size: larger;font-weight: bolder;">{{$magazine->title}} </span></p>
                                    </div>
                                    <div >
                                     <ul>
                                         <?php foreach($articles as $article){
                                              foreach($article->category()->get() as $category)
                                              {
                                                  $category_array[]=$category->category_name  ;
                                              }

                                         }
                                   
                                         $category_array=array_unique($category_array);
                                        
                                      ?>

                                      @foreach($category_array as $a)
                                  
                                         <li>
                                         <img src="images/icon_category.png" style="width:30px;height:30px;">
                                         <a href="/show_category/{{$a}}"> {{$a }}</a>
                                            </li>
                                         {{-- <li>
                                         <img src="images/icon_category.png" style="width:30px;height:30px;">
                                            <a href="/show_all">اخبار</a>
                                         </li>
                                         <li>
                                                <img src="images/icon_category.png" style="width:30px;height:30px;">
                                                   <a href="/show_hotest">اخبار ساخنة</a>
                                         </li> --}}
                                
                                   @endforeach
                                     </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                    </div>
             
                </div>
            </div>


        <div style="min-height:250px"></div>

@endsection