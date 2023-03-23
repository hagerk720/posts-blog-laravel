<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasFactory, SoftDeletes ,Sluggable,HasTags;
    public $uploads ='/storage/images/';
    protected $morphClass = 'post';

    protected $fillable =[
        'title',
        'description',
        'user_id',
        'slug',
        'image',
        'tags'
       
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function setImageAttribute($value)
    {
    $imageName = time().'.'.$value->getClientOriginalExtension();
    $value->storeAs('public/images/posts', $imageName);
    $this->attributes['image'] = 'storage/images/posts/'.$imageName;
    }
    protected static function boot()
    {

        parent::boot();
        static::deleting(function ($post) {
            Storage::delete($post->image);
        });
        static::updating(function ($post) {
            $originalImagePath = $post->getOriginal('image');
            $newImagePath = $post->getAttribute('image');
            if ($originalImagePath != $newImagePath) {
                // dd("original image" , $originalImagePath , "new " , $newImagePath);
                 Storage::delete($originalImagePath);
            }
        });
    }

}
