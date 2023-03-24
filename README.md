<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Posts Blog using Laravel 

This is a simple blog posts project built with Laravel. It allows users to create and publish blog posts, view a list of all posts, view individual posts, and leave comments on posts.
each user can view his profile and upload his/her image 

# Featuers
## Posts Features
- Ability to delete posts using the soft delete technique, as well as the ability to restore and destroy them permanently.
- A scheduled job is implemented to delete old posts that are created two years ago, every midnight.
- A slug is created for each post to enhance SEO.
- Users can upload an image for each post. 
- Tags can be added for each post, and they can also be deleted.
- Every post has a unique title.
## Users Features
- Each user has a limited number of posts.
- Each user can upload their image using the media library.
- Users can update their information such as name, email, address, and photo
## Comments Part
comments part implemented using Livewire 

## used Packages 

This project makes use of the following packages:

| Packages Name | For |
| ------------- | ------------- |
| Livewire  | building dynamic interfaces  |
| Laravel Ui  | authentication   |
| eloquent-sluggable  |  creation of slugs  |
| laravel-tags |  taggable behaviour  |
| Laravel-medialibrary |  Associate files with Eloquent models  |

## Laravel-medialibrary enhancement

A custom URL generator is added to include the port number in the image URL. This is implemented using the following code:
```
class CustomUrlGenerator extends DefaultUrlGenerator
{
    public function getUrl(): string
    {
        $url = parent::getUrl();

        $urlParts = parse_url($url);

        if (isset($urlParts['port'])) {
            return $url;
        }

        $port = Request::getPort();

        if ($port) {
            $urlParts['port'] = $port;
        }

        return http_build_url('', $urlParts);
    }
}
```

