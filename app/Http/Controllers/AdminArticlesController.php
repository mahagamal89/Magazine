<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Magazine;
use App\Http\Requests\UpdateArticleRequest;

class AdminArticlesController extends Controller
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
        $articles = Article::all();
        return view('admin.articles.index')->with('articles', $articles);
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
        //
        $magazines = Magazine::where('is_active', 1)->orderBy('created_at', 'desc')->get();
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('magazines', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        //
        $article = Article::findOrFail($id);
        if($request->has('article_cover')){

            //Asigning the uploaded image to a variable
            $file = $request->article_cover;
            //Asigining the image a new name
            $cover_name = time() . $file->getClientOriginalName();
            //Moving image to images folder and saving in database
            $file->move('images', $cover_name);
            //deleting old file
            if(file_exists(public_path().'/images/'.$article->article_cover)){
                unlink(public_path().'/images/'.$article->article_cover);
            }
            $article->article_cover = $cover_name;
        }
        $article->article_title = $request->article_title;
        $article->article_content = $request->article_content;
        $article->magazine_id = $request->magazine_id;
        $article->save();
        
        return redirect('/admin/articles');
    }

    public function activation(Request $request, $id){
            //
        $article = Article::findOrFail($id);
        //Change active state to the oppisite
        if($article->magazine_id != 0){
            $article->is_active == 1 ? $article->is_active = 0 : $article->is_active = 1;
        }else{
            return back()->with('info', 'برجاء تعين مجلة للمقالة لتفعيل المقالة');
        }
        //Saving and redirecting back
        $article->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete and redirect to the same page
        $article = Article::findOrFail($id);
        //Delete Old file
        if(file_exists(public_path().'/images/'.$article->article_cover)){
            unlink(public_path().'/images/'.$article->article_cover);
        }
        if(count($article->photos)>0){
            foreach($article->photos as $photo){
                if(file_exists(public_path().'/images/'.$photo->path)){
                    unlink(public_path().'/images/'.$photo->path);
                } 
            }
        }
        $article->delete();
        return back();
    }
}
