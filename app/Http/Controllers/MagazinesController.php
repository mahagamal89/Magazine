<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magazine;
use App\Channel;
use App\Article;
use App\Category;
use App\Http\Requests\CreateMagazineRequest;

class MagazinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
           $this->middleware('auth')->except(['index', 'show','show_pdf','latest','add_title']);
           $this->middleware('Admin')->except(['index', 'show','show_pdf','latest','add_title']);

    }


    public function index()
    {
        $magazines = Magazine::all();
        return view('magazines.index', compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('magazines.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMagazineRequest $request)
    {
        //Finding and instantiating needed objects
        $magazine = new Magazine;
        $magazine->magazine_name = $request->magazine_name;

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
         //If the user was an admin the magazine will be autmatically active
        auth()->user()->is_admin == 1 ? $magazine->is_active = 1 : $magazine->is_active = 0;
         //Creating the new magazine 
         $magazine->channel_id = 1;
         $magazine->save();
        //redirecting with a temp success session
        return redirect('/magazines')->with('success', 'تم اضافة الإصدار بنجاح');
         
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
        $magazine = Magazine::findOrFail($id);
        $articles = Article::where('magazine_id', $id)->where('is_active', '1')->get();
        return view('magazines.show', compact('magazine', 'articles'));
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
    }
    public function show_pdf(Request $request){
        $magazine = Magazine::findOrFail($request->id);
        return view('pdf.show')->with('magazine', $magazine);
    }

    public function latest_pdf(){
        //Get the latest magazine
        $magazine = Magazine::where('is_active', 1)->orderBy('created_at', 'desc')->first();
        return view('pdf.latest')->with('magazine', $magazine);
    }

    
    
    public function latest(){
        // //Get the latest magazine
         $magazine = Magazine::where('is_active', 1)->orderBy('created_at', 'desc')->first();
         $articles=$magazine->articles()->get();
     
        return view('magazines.latest',compact('magazine','articles'));
      
    }

    public function add_title(Request $request,$id){
        // // //Get the latest magazine
          $magazine =Magazine::findOrFail($id);
          $magazine->title = $request->title;
          $magazine->save();
          return back();
     
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
