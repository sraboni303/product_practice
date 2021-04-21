<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('test',compact('categories'));
    }

    public function data(Request $request){

        if($request->has('cat_id')){
            $parentId = $request->get('cat_id');
            $data = Category::where('category_id',$parentId)->get();
            return ['success'=>true,'data'=>$data];
        }

    }

}
