<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
   public function AllCat(){
    //    $categories =category::all();
    $categories =category::latest()->paginate(8);
    // $categories =DB::table('categories')->paginate(5);
       return view('admin.category.index',compact('categories'));
   }


   public function AddCat(Request $request){
   $request->validate([
        // 'category_name' => ['required', 'unique:posts', 'max:255'],
        'category_name' =>'required|max:255',

    ]);

    category::insert([
        'category_name' =>$request->category_name,
        'user_id' =>Auth::user()->id,
        'created_at' => Carbon::now()
    ]);
    return Redirect()->back()->with('success','Category Inserted');


    // $category = new category;
    // $category->category_name =$request->category_name;
    // $category->user_id = Auth::user()->id;
    // $category->save();
}
}
