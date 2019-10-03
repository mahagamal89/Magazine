<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
class AdminSitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites=Site::all();
        return view('admin.sites.index',compact('sites'));
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
        $site = new Site;
        $site->title = $request->title;
        $site->link = $request->link;
        //Asigning the uploaded image to a variable
        $file = $request->logo_path;
        //Asigining the image a new name
        $logo_name = time() . $file->getClientOriginalName();
        //Moving image to images folder and saving in database
        $file->move('images', $logo_name);
        $site->logo_path = $logo_name;
        $site->save();
        return redirect('/admin/sites')->with('success', 'تم اضافة الراعي بنجاح.');;
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
        $site = Site::findOrFail($id);
        return view('admin.sites.edit', compact('site'));
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
        $site = Site::findOrFail($id);
        if($request->has('logo_path')){
            //Asigning the uploaded image to a variable
            $file = $request->logo_path;
            //Asigining the image a new name
            $logo_name = time() . $file->getClientOriginalName();
            //Moving image to images folder and saving in database
            $file->move('images', $logo_name);
            //deleting old file
            if(file_exists(public_path().'/images/'.$site->logo_path)){
                unlink(public_path().'/images/'.$site->logo_path);
            }
            $site->logo_path = $logo_name;
        }
        $site->title = $request->title;
        $site->link = $request->link;
        $site->save();
        return redirect('/admin/sites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = Site::findOrFail($id);
        //deleting old file
        if(file_exists(public_path().'/images/'.$site->logo_path)){
            unlink(public_path().'/images/'.$site->logo_path);
        }
        $site->delete();
        return back();
    }
}
