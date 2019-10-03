<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\User;
use App\Magazine;
use App\Article;
use App\Comment;
use App\Sponsor;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('Admin')->except(['showAdminLogin']);
    }
    public function index(){
        $channels = Channel::all();
        $users = User::all();
        $magazines = Magazine::all();
        $comments = Comment::all();
        $sponsors = Sponsor::all();
        $articles = Article::where('id','>','0')->orderBy('created_at', 'desc')->get();

        return view('admin.index', compact('channels', 'users', 'magazines', 'articles', 'comments','sponsors'));
    }
    public function showAdminLogin(){
        return view('admin.auth.login');
    }
}
