<?php

namespace App\Rules;

use App\Models\Post;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class MaxPostsPerUser implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public $user ; 
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $this->user = User::find($value);
        if(Post::where('user_id', $this-> user->id)->count() >= 3){
          $fail("Sorry, User \"{$this->user["name"]}\" Exceed the max posts number");
        }
    }

    public function message()
    {
        return 'You have exceeded the maximum number of posts.';
    }
}
