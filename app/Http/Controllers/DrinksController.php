<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drinks;

class DrinksController extends Controller
{

    //authenticate user
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drinks::orderBy('created_at','desc')->paginate(20);
        return view('pages.drinks.index')->with('drinks',$drinks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'drinksname'=>'required',
            'price'=>'required',
        ]);

        //Handle File Upload
        if($request->hasFile('drinks_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('drinks_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('drinks_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore =$filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('drinks_image')->storeAs('public/drinks_images',$fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Drinks
        $drinks = new Drinks;
        $drinks->drinksname=$request->input('drinksname');
        $drinks->description=$request->input('description');
        $drinks->price=$request->input('price');
        $drinks->drinks_image = $fileNameToStore;
        $drinks->user_id = auth()->user()->id;
        $drinks->save();

        return redirect('/drinks')->with('success','Drinks Item Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drinks = Drinks::find($id);
        return view('pages.drinks.show')->with('drinks',$drinks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drinks = Drinks::find($id);

        /*Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }*/

        return view('pages.drinks.edit')->with('drinks',$drinks);
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
        $this->validate($request,[
            'drinksname'=>'required',
            'price'=>'required',
        ]);

        //Handle File Upload
        if($request->hasFile('drinks_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('drinks_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('drinks_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore =$filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('drinks_image')->storeAs('public/drinks_images',$fileNameToStore);
        }

        // Create Drinks
        $drinks = Drinks::find($id);
        $drinks->drinksname=$request->input('drinksname');
        $drinks->description=$request->input('description');
        $drinks->price=$request->input('price');
        if($request->hasFile('drinks_image')){
            $drinks->drinks_image = $fileNameToStore;
        }
        $drinks->user_id = auth()->user()->id;
        $drinks->save();

        return redirect('/drinks')->with('success','Drinks Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drinks = Drinks::find($id);
        
        /*Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }*/

        $drinks->delete();
        return redirect('/drinks')->with('success','Drinks Item Removed');
    }
}
