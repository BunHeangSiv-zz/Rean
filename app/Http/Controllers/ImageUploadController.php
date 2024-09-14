<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function index(){
        $images = Image::all();
        return view('upload', compact('images'));
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $imageName = time().'.'.$request -> image -> extension();
        $request -> image -> move(public_path('images'), $imageName);

        Image::create([
            'filename' => $imageName
        ]);
        return back() -> with('success', 'Image Uploaded Successfully');
    }

    // public function show(){
    //     $images = Image::all();
    //     return view('upload', compact('images'));
    // }
}
