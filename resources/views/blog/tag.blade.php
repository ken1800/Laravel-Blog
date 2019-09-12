<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Tag {{$tag->name}}</title>

    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('favicon.png')}}">
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="../index.html">
                <img class="logo-dark" src="../assets/img/logo-dark.png" alt="logo">
                <img class="logo-light" src="../assets/img/logo-light.png" alt="logo">
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>


        </section>

        <a class="btn btn-xs btn-round btn-success" href="{{route('login')}}">Login</a>

    </div>
</nav><!-- /.navbar -->


<!-- Header -->
<header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
    <div class="container">

        <div class="row">
            <div class="col-md-8 mx-auto">

                <h1>{{$tag->name}}</h1>
                <p class="lead-2 opacity-90 mt-6">Read and Get Updated On the Latest Software Update</p>

            </div>
        </div>

    </div>
</header><!-- /.header -->


<!-- Main Content -->
<main class="main-content">
    <div class="section bg-gray">
        <div class="container">
            <div class="row">


                <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">

                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                    <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top" src="{{ asset('storage/'.$post->image)}}" alt="Card image cap"></a>
                                    <div class="p-6 text-center">
                                        <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="3">{{$post->category->name}}</a></p>
                                        <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show',$post->id)}}">{{$post->title}}</a></h5>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                    </div>


                    {{$posts->links()}}
                </div>

                @include('partial.sidebar')


            </div>
        </div>
    </div>
</main>


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">


            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>


        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{asset('js/page.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
