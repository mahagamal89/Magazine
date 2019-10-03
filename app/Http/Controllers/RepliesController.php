<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
use App\Reply;
use App\Article;
class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
         
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $comment_id)
    {
        
         $comment = Comment::findOrFail($comment_id);
         $reply =new Reply;
        $reply->reply_content = $request->reply_content;
        $reply->username=$request->username;
        if(Auth::check()){
            $reply->img_path=auth()->user()->img_path;
             }
        //Checking if the logged in user is an admin and if so status will be active and its delault if there is no logged in user is zero
        if(Auth::check()){
        auth()->user()->is_admin == 1 ? $reply->is_active = 1 : $reply->is_active = 0;
        }
             $comment->replies()->save($reply);
            
          return back();
     
    }
}
