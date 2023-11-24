<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\CategoryD;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function home (){
    $destcategory = CategoryD::all();
    return view('landingpage.home', compact('destcategory'));
  }

  public function about (){
    $destcategory = CategoryD::all();
    return view('landingpage.about', compact('destcategory'));
  }


  public function destination (){
    $destination = Destination::all();
    $destcategory = CategoryD::all();
    return view('landingpage.destination', compact('destcategory', 'destination'));
  }

  public function contact (){
    $destcategory = CategoryD::all();
    return view('landingpage.contact', compact('destcategory'));
  }
  


}