<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getCategory($id){
        $categories = Category::where('parent_id',$id)->with(['categoryDetails','styles'])->get();
        return response()->json($categories);
    }
    public function parent(){
        $categories = Category::where('parent_id',null)->with('categoryDetails')->get();
        return response()->json($categories);
    }
    public function grandparent($id){
        $category = Category::find($id);
        $categories = Category::where('parent_id',$category->parent_id)->get();
        return response()->json($categories);
    }
    public function styles($id){
        $category_styles = Category::find($id);
        return response()->json($category_styles->styles);
    }

}
