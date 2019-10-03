<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magazine;
use App\Sponsor;
use App\Channel;
use App\Http\Requests\CreateMagazineRequest;

class AdminMagazinesController extends Controller
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
        $magazines = Magazine::all();
        return view('admin.magazines.index')->with('magazines', $magazines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.magazines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMagazineRequest $request)
    {
        //
        $magazine = new Magazine;

        $magazine->magazine_name = $request->magazine_name;
        $magazine->is_active = 1;

        //Asigning the uploaded file to variables
        $photo = $request->cover_path;
        $pdf = $request->pdf_path;
        //Asigining the image a new name
        $cover_name = time() . $photo->getClientOriginalName();
        $pdf_name = time() . $pdf->getClientOriginalName();
        //Moving image to images folder
        $photo->move('images', $cover_name);
        $pdf->move('images/pdfs', $pdf_name);
        //Saving file name to the database
        $magazine->cover_path = $cover_name;
        $magazine->pdf_path = $pdf_name;
        $magazine->channel_id = 1;

        //Creating the new magazine by its channel
        $magazine->save();
        //redirecting with a temp success session
        return redirect('/admin/magazines')->with('success', 'تم اضافة الإصدار بنجاح');

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
        $magazine = Magazine::findOrFail($id);
        return view('admin.magazines.edit')->with('magazine', $magazine);
    }
    public function update(Request $request, $id)
    {
        
        //
        $magazine = Magazine::findOrFail($id);
        if($request->has('pdf_path')){
            //Asigning the uploaded image to a variable
            $pdf_file = $request->pdf_path;
            //Asigining the image a new name
            $pdf_name = time() . $pdf_file->getClientOriginalName();
            //Moving image to images folder and saving in database
            $pdf_file->move('images', $pdf_name);
            //deleting old file
            if(file_exists(public_path().'/images/pdfs/'.$magazine->pdf_path)){
                unlink(public_path().'/images/pdfs/'.$magazine->pdf_path);
            }
            $magazine->pdf_path = $pdf_name;
        }
        if($request->has('cover_path')){
            //Asigning the uploaded image to a variable
            $file = $request->cover_path;
            //Asigining the image a new name
            $cover_name = time() . $file->getClientOriginalName();
            //Moving image to images folder and saving in database
            $file->move('images', $cover_name);
            //deleting old file
            if(file_exists(public_path().'/images/'.$magazine->cover_path)){
                unlink(public_path().'/images/'.$magazine->cover_path);
            }
            $magazine->cover_path = $cover_name;
        }
        $magazine->magazine_name = $request->magazine_name;
        $magazine->save();
        return redirect('/admin/magazines')->with('success', 'تم تعديل الاصدار بنجاح');

    }
    
    public function activation(Request $request, $id){
        //
        
        // $magazine = Magazine::findOrFail($id);
        // //check activation status and reverse it
        // $magazine->is_active == 0 ? $magazine->is_active = 1 : $magazine->is_active = 0;
        // $magazine->save();
        $magazines = Magazine::all();
        foreach($magazines as $magazine){
            if($magazine->id == $id){
                $activate_magazine = Magazine::findOrFail($id);
                //check activation status and reverse it
                $activate_magazine->is_active = 1;
                $activate_magazine->save();
            }else{
                $magazine->is_active = 0;
                $magazine->save();
            }
        }

        return back();
    }
    public function addSponsor($magazine_id){
        $sponsors = Sponsor::all();
        $magazine = Magazine::findOrFail($magazine_id);
        return view('admin.magazines.sponsors', compact('sponsors', 'magazine'));
    }
    public function attachSponsor(Request $request,$magazine_id, $sponsor_id){
        $sponsor = Sponsor::findOrFail($sponsor_id);
        $magazine = Magazine::findOrFail($magazine_id);
        //Attach the sponsor to the magazine only if it doesn't have it
        if (! $magazine->sponsors->contains($sponsor_id)) {
            $magazine->sponsors()->attach($sponsor);
        }
        return redirect('/admin/magazines/'.$magazine_id.'/sponsors');
    }
    public function detachSponsor(Request $request,$magazine_id, $sponsor_id){
        $sponsor = Sponsor::findOrFail($sponsor_id);
        $magazine = Magazine::findOrFail($magazine_id);
        $magazine->sponsors()->detach($sponsor);
        return redirect('/admin/magazines/'.$magazine_id.'/sponsors');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magazine = Magazine::findOrFail($id);
        //deleting old file
        if(file_exists(public_path().'/images/'.$magazine->cover_path)){
            unlink(public_path().'/images/'.$magazine->cover_path);
        }
        if(file_exists(public_path().'/images/pdfs/'.$magazine->pdf_path)){
            unlink(public_path().'/images/pdfs/'.$magazine->pdf_path);
        }
        $magazine->articles()->delete();
        $magazine->delete();
        return back();
    }
}
