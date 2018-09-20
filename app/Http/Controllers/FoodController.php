<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
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
        //$title = 'Food List';
        //return view('pages.about');
        $food = Food::orderBy('created_at','desc')->paginate(20);
        return view('pages.food.index')->with('food',$food);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.food.create');
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
            'foodname'=>'required',
            'price'=>'required',
        ]);

        //Handle File Upload
        if($request->hasFile('food_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('food_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('food_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore =$filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('food_image')->storeAs('public/food_images',$fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Food
        $food = new Food;
        $food->foodname=$request->input('foodname');
        $food->description=$request->input('description');
        $food->price=$request->input('price');
        $food->food_image = $fileNameToStore;
        $food->user_id = auth()->user()->id;
        $food->save();

        return redirect('/food')->with('success','Food Item Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);
        return view('pages.food.show')->with('food',$food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);

        /*Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }*/

        return view('pages.food.edit')->with('food',$food);
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
            'foodname'=>'required',
            'price'=>'required',
        ]);

        //Handle File Upload
        if($request->hasFile('food_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('food_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('food_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore =$filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('food_image')->storeAs('public/food_images',$fileNameToStore);
        }

        // Create Food
        $food = Food::find($id);
        $food->foodname=$request->input('foodname');
        $food->description=$request->input('description');
        $food->price=$request->input('price');
        if($request->hasFile('food_image')){
            $food->food_image = $fileNameToStore;
        }
        $food->user_id = auth()->user()->id;
        $food->save();

        return redirect('/food')->with('success','Food Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        
        /*Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }*/

        $food->delete();
        return redirect('/food')->with('success','Food Item Removed');
    }
}
