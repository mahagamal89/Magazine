<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;
class SponsorsController extends Controller
{
      public function index(){
        $sponsors=Sponsor::all();
        return view('sponsors.index',compact('sponsors'));
    }   
}
