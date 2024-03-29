<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet"  href="{{ asset('css/supplement/sup_list.css') }}">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('show_information')}}">Home</a></li>
                       
                        
                    </ul>
                
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Supplyment List</h1>
                  
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            
                        @foreach($supplements as $supplement)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- supplement image -->
                                <img class="card-img-top" src="{{ $supplement->thumbnail_img }}" alt="Supplement Image" />
                                <!-- Product details -->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- supplement name -->
                                        <h5 class="fw-bolder">{{ $supplement->supplement_name }}</h5>
                                        <!-- Category (assuming it's a field in your supplements table) -->
                                        {{ $supplement->category }}
                                    </div>
                                </div>
                                <!-- Supplement id in href -->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="{{ url('supplement/detail', ['detail' => $supplement->supplement_id]) }}">View detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                    
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5">
            
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
    </body>
</html>
