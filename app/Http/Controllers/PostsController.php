<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    public function __construct()
    {
        //by adding this line, all the website is  authenticated (User muss anmelden)
        $this->middleware('auth');
    }

    public function create()
    {
        //we can use here posts/create or posts.create, they are just the same
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        //if we want to sotre in Amazon, then we use ->store('uploads','s3')
        $imagePath = request('image')->store('uploads', 'public');

        // get square image: fit(pixel-width, pixel-height), differ than resize
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
        // dd($post);
        return view('posts.show', compact('post'));
        // return view('posts.show',['post'=>$post,]);
        
        //beide Return-Klausel sind identisch, aber compact() ist Kurzschreibform
    }
}
