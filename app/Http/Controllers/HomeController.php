<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Channel;
use App\Sponsor;
use App\Magazine;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get archieves
        $articles=new Article;
        $archives= $articles::selectRaw('year(created_at) year , monthname(created_at) month ,count(*) published')->groupBy('year','month')->orderByRaw('min(created_at) desc')->get()->toArray();
        $categories = Category::all();
        // Get Most Viewed Articles in the past week and if they are less than 3 get the most viewed article in past month
        $most_viewed = Article::where('created_at','>', date('Y-m-d',time() - 60*60*24*7))->orderBy('views', 'desc')->get();
        if(count($most_viewed) < 3){
            $most_viewed = Article::where('created_at','>', date('Y-m-d',time() - 60*60*24*30))->orderBy('views', 'desc')->get();
        }
        //Get sponsors
        $sponsors = Sponsor::where('created_at', '>', date('Y-m-d',time() - 60*60*24*365))->orderBy('ordering', 'desc')->get();
        $sponsorsArr = $sponsors->toArray();
        $latestSponsors = array_slice($sponsorsArr, 0 , 10);

        //Most 10 viewed articles
        $most_popular = Article::where('is_active', 1)->orderBy('views', 'desc')->get();
        $most_popular = $most_popular->toArray();
        $most_popular = array_slice($most_popular, 0, 10, true);
        // Get latest 5 articles
        $articles = Article::where('is_active', 1)->orderBy('created_at', 'desc')->get();
        $articles = $articles->toArray();
        $firstArticles = array_slice($articles, 0, 4, true);
      
        $secondArticles = array_slice($articles, 0, 3, true);

        //Get latest 3 created channels 
        $magazines = Magazine::where('is_active', 1)->orderBy('created_at', 'desc')->get();
        $magazines = $magazines->toArray();
        $latest_magazines = array_slice($magazines, 0, 3, true);
        //   foreach($firstArticles as $i => $article){
        //     $lastAtricles=array_slice($articles,$i,1,true);
        //   }
        return view('dashboard', compact('categories', 'most_viewed', 'firstArticles','secondArticles', 'latest_magazines', 'archives', 'latestSponsors', 'most_popular'));
    }
}
