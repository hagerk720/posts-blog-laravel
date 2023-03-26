<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception ; 

class LoginWithGitHubController extends Controller
{
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleGitHubCallback()
    {
        try {     
            $user = Socialite::driver('github')->user();
                $newUser = User::updateOrCreate([
                    'github_id' => $user->id],
                    [
                    'name' => $user->name,
                    'email' => $user->email,
                ]);
                Auth::login($newUser);
                return redirect()->intended('posts');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
