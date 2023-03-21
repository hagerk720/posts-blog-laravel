<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.index',['user'=>$user]);
    }
    public function update(Request $request){

        $user = User::findOrFail(Auth::user()->id);
        $user-> profile() ->updateOrCreate(
            ['user_id' => $user->id],
        [   
            'address' => $request -> address,   
            'photo' => 'null',
        ]
    );
        $user->name = $request['name'];
        $user->email = $request['email'];
        // $user->password = $request['password'];
        $user->save();
    return redirect()->back()->with('message', 'user profile updated successfully'); 
    }
}
