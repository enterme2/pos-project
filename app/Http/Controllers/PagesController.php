<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index']]);
    }

    public function index(){
    	$title = 'DEMO VERSION';
    	//return view('pages.index',compact('title'));
    	return view('index')->with('title',$title);
    }

    public function home(){
        $title = 'Menu';
        //return view('pages.index',compact('title'));
        return view('pages.index')->with('title',$title);
    }

    public function about(){
    	$title = 'About Page';
    	//return view('pages.about');
    	return view('pages.about')->with('title',$title);
    }

    public function drinks(){
        $title = 'Drinks List';
        //return view('pages.about');
        return view('pages.drinks')->with('title',$title);
    }

    public function services(){
    	$data = array(
    		'title'=>'Services',
    		'content'=>'This is array content sample',
    		'services'=>['Web Design','Programming','SEO']
    	);
    	//return view('pages.services');
    	return view('pages.services')->with($data);
    }


}
