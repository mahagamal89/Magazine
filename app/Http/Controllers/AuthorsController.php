<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth')->except('index');
     }
    public function index(){
        $users=User::all();
        return view('authors.index',compact('users'));
    }   

    public function profile(){
        $user=auth()->user();
      
         return view('authors.profile',compact('user'));
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        return view('authors.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);

        if($request->has('img_path')){
            //Asigning the uploaded image to a variable
            $img_path = $request->img_path;
            //Asigining the image a new name
            $img_name = time() . $img_path->getClientOriginalName();
            //Moving image to images folder and saving in database
            $img_path->move('images', $img_name);
            //deleting old file
            if($user->img_path){
                if(file_exists(public_path().'/images/'.$user->img_path)){
                    unlink(public_path().'/images/'.$user->img_path);
                }
            }
            $user->img_path = $img_name;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if($request->has('mobile_number')){
            $user->mobile_number = $request->mobile_number;
        }
        if($request->has('additional_number')){
            $user->additional_number = $request->additional_number;
        }
        $user->save();
        return redirect('/profile')->with('success', 'تم تعديل المعلومات الشخصية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
