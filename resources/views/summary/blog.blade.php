<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <link rel="stylesheet"  href="{{ asset('css/summary/blog.css') }}">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-blue bg-blue">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{route('show_information')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('display_blog_create')}}">Create Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-dark border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5 text-white">
                    <h1 class="fw-bolder">Welcome to Blog Page!</h1>
                    <p class="lead mb-0">This is where you can find blog about fitness and diet</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            @if (isset($blogs) && is_array($blogs) && count($blogs) > 0)
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{$blogs[0]->blog_img}}" width="850" height="350"     /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{$blogs[0]->blog_date}}</div>
                            <h2 class="card-title">{{$blogs[0]->blog_title}}</h2>
                            <a class="btn btn-primary" href="{{ url('blog', ['blog' => $blogs[0]->blog_id]) }}">Read more →</a>

                        </div>
                    </div>
    


                    <div class="row">
                        @for ($i = 1; $i < count($blogs); $i+=2)
                            <div class="col-lg-6">
                                <!-- Blog post 1 -->
                                <div class="card mb-4">
                                    <a href="#!"><img class="card-img-top" src="{{ $blogs[$i]->blog_img }}" width="850" height="350"     /></a>
                                    <div class="card-body">
                                        <div class="small text-muted">fix</div>
                                        <h2 class="card-title h4">{{ $blogs[$i]->blog_title }}</h2>
        
                                        <a class="btn btn-primary" href="{{url('blog', ['blog' => $blogs[$i]->blog_id]) }}">Read more →</a>
                                    </div>
                                </div>
                            </div>
                            @if ($i + 1 < count($blogs))
                                <div class="col-lg-6">
                                    <!-- Blog post 2 -->
                                    <div class="card mb-4">
                                        <a href="#!"><img class="card-img-top" src="{{ $blogs[$i]->blog_img }}" width="850" height="350"     /></a>
                                        <div class="card-body">
                                            <div class="small text-muted">fix</div>
                                            <h2 class="card-title h4">{{$blogs[$i]->blog_title}}</h2>
                                            <a class="btn btn-primary" href="{{url('blog', ['blog' => $blogs[$i]->blog_id]) }}">Read more →</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    
                        {{-- Check if the last set has only one item --}}
                        @if (count($blogs) % 2 != 0 && count($blogs) != 1)
                                <!-- Blog post (last item) -->
                                <div class="card mb-4">
                                    <a href="#!"><img class="card-img-top" src="{{ $blogs[count($blogs) - 1]->blog_img }}" width="850" height="350"   /></a>
                                    <div class="card-body">
                                        <div class="small text-muted">fix</div>
                                        <h2 class="card-title h4">{{ $blogs[count($blogs) - 1]->blog_title }}</h2>
                                        <a class="btn btn-primary" href="{{ url('blog', ['blog' => $blogs[count($blogs) - 1]->blog_id]) }}">Read more →</a>
                                    </div>
                                </div>
                        @endif
                    </div>
                    
                    
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                       
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                </div>
            </div>
            @else
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2023</div>
                            <h2 class="card-title">Featured Post Title</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="#!">Read more →</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2023</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2023</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2023</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2023</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                       
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                </div>
            </div>
            @endif

        <!-- Footer-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
