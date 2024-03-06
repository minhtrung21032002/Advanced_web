<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet"  href="{{ asset('css/supplement/sup_detail.css') }}">
        <style>
             .list-group-item {
            border: none;
        }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Supplyment Detail</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('show_information')}}">Home</a></li>
                    
                    </ul>
                 
                </div>
            </div>
        </nav>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ $supplement->detail_img }}" alt="Detail Image" /></div>
                    <div class="col-md-6">
                        <div class="medium mb-1">Product Name: {{ $supplement->supplement_name }}</div>
                        <h1 class="display-5 fw-bolder">Product Overview:</h1>
                        <p class="lead">{{ $supplement->product_overview }}</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Related items section -->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
        
                <!-- Component section -->
                <h2 class="fw-bolder mb-4">Component</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                    <div class="col mb-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Component</th>
                                    <th scope="col">Purpose</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($components as $index => $component)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $component->component_name }}</td>
                                        <td>{{ $component->purpose }}</td> <!-- Add this line for purpose -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        
                <!-- Usage section -->
                <h2 class="fw-bolder mb-4">Usage</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                    <div class="col mb-5">
                        <ul class="list-unstyled">
                            @foreach ($usage as $use)
                                <li>
                                    <i class="bi bi-check"></i> {{ $use->usage_text }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
        
                <!-- How To Use section -->
                <h2 class="fw-bolder mb-4">How To Use</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                    <div class="col mb-5">
                        {{$supplement ->how_to_use}}
                    </div>
                </div>
        
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 ">
            
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       
    </body>
</html>
