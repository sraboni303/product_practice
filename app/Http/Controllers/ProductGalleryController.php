<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Symfony\Component\String\b;

class ProductGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::simplePaginate(5);
        return view('gallery.index', compact('galleries'));
    }


    public function create($id)
    {
        return view('gallery.create', compact('id'));

    }


    public function store(Request $request)
    {

        foreach($request->file as $image){
            if($image){
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/gallery', $image, $imageName);

                $url = 'storage/gallery/' . $imageName;

                Gallery::create([
                    'name' => $url,
                    'product_id' => $request->product_id,
                ]);

            }

        }
        Gallery::create($request->validated());

    }


    public function delete($id){
        $gallery = Gallery::find($id);
        $gallery->delete();
        return back();
    }



}
