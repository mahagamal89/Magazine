<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;
use App\Http\Requests\CreateSponsorRequest;

class AdminSponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');
    }
    public function index()
    {
        //
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index')->with('sponsors', $sponsors);
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
    public function store(CreateSponsorRequest $request)
    {
        //
        $sponsor = new Sponsor;
        $sponsor->name = $request->name;
        //Asigning the uploaded image to a variable
        $file = $request->logo_path;
        //Asigining the image a new name
        $logo_name = time() . $file->getClientOriginalName();
        //Moving image to images folder and saving in database
        $file->move('images', $logo_name);
        $sponsor->logo_path = $logo_name;
        $sponsor->save();
        return redirect('/admin/sponsors')->with('success', 'تم اضافة الراعي بنجاح.');;
        
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
        //
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.sponsors.edit', compact('sponsor'));
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
        $sponsor = Sponsor::findOrFail($id);
        if($request->has('logo_path')){
            //Asigning the uploaded image to a variable
            $file = $request->logo_path;
            //Asigining the image a new name
            $logo_name = time() . $file->getClientOriginalName();
            //Moving image to images folder and saving in database
            $file->move('images', $logo_name);
            //deleting old file
            if(file_exists(public_path().'/images/'.$sponsor->logo_path)){
                unlink(public_path().'/images/'.$sponsor->logo_path);
            }
            $sponsor->logo_path = $logo_name;
        }
        $sponsor->name = $request->name;
        $sponsor->save();
        return redirect('/admin/sponsors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        //deleting old file
        if(file_exists(public_path().'/images/'.$sponsor->logo_path)){
            unlink(public_path().'/images/'.$sponsor->logo_path);
        }
        $sponsor->delete();
        return back();
    }
}
