<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @livewireStyles

</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ITI Blog Post</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="{{route('posts.index')}}">All Posts</a>
                    <a class="nav-link active" href="{{route('posts.deleted-posts')}}">Deleted Posts</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container w-75 mt-5">
        <div class="card p-5" style="background-color: #e5e5f7;
        opacity: 0.8;
        background-image: repeating-linear-gradient(45deg, #dfdfe0 25%, transparent 25%, transparent 75%, #dfdfe0 75%, #dfdfe0), repeating-linear-gradient(45deg, #dfdfe0 25%, #e5e5f7 25%, #e5e5f7 75%, #dfdfe0 75%, #dfdfe0);
        background-position: 0 0, 5px 5px;
        background-size: 10px 10px;">
        @yield('content')

        </div>
        <nav aria-label="Page navigation example">
</nav>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @yield('modal')
    @livewireScripts

</body>

</html>