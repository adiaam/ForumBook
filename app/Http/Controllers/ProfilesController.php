<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{   
    // public function index($user)
    // {
    //     $user = User::findOrFail($user);
    //     return view('profiles.index',[
    //         'user'=>$user,
    //     ]);
    // } beide INDEX-Methoden sind IDENTISCH

    public function index(User $user)
    {
        return view('profiles.index',compact('user'));
    }

    public function edit(User $user)
    {
        // we authorize the "update"-function, so now the edit function is protected(authorized)
        $this->authorize('update',$user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update',$user->profile);
        $data = request()->validate([
        'title'=>'required',
        'description'=>'required',
        'url'=>'url',
        'image'=>'',
        ]);
        // without auth(), every user can change any profile.
        
        //save profile-image in profile-folder, only if the user change it, otherwise use the old one.
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // array_merge, will merge two arrays and override the 'image' index from the first one.
        auth()->user()->profile->update(array_merge(
            $data,
            // if imageArray is not set, set it to an empty array, and that will not override any $data.(that to prevent image variable not defined)
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
