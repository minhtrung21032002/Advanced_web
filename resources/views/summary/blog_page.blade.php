<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet"  href="{{ asset('css/summary/blog_page.css') }}">
   

        <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css"
rel="stylesheet"
/>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-blue bg-blue">
            
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Welcome to {{$blog->blog_title}}!</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">{{$blog->blog_date}}</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Blog Food</a>
                        </header>
                        <!-- Preview image figure-->
    
                    </article>
                </div>

                @foreach($paragraph as $element)
                <h2 class="fw-bolder mb-4 mt-5">{{$element->paragraph_title}}</h2>
                <figure class="mb-4"><img class="img-fluid rounded" src="{{$element->paragraph_img}}" alt="..." /></figure>
                <section class="mb-5">
                    @php
                    $paragraphContent = json_decode($element->paragraph_content);
                    @endphp


                      @if(is_array($paragraphContent))
                      @foreach($paragraphContent as $text)
                          <p class="fs-5 mb-4">{{$text}}</p>
                      @endforeach
                    @else
                      <p class="fs-5 mb-4">{{$paragraphContent}}</p>
                  @endif
                </section>
                @endforeach
                
              
            </div>
        </div>
  
        <section style="background-color: #eee;">
          <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
              <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">

                    <!-- Comment-->
                    @foreach ($comments_information as $comment_info)
                      <div class="card-body">
                          <div class="d-flex flex-start align-items-center">
                            <img class="rounded-circle shadow-1-strong me-3"
                            src="{{ isset($comment_info['photo_information'][0]->photo_url) ? $comment_info['photo_information'][0]->photo_url : 'default_path.jpg' }}"
                            alt="avatar" width="60" height="60" />
                              <div>
                                  <h6 class="fw-bold text-primary mb-1">{{ $comment_info['user_information'][0]->user_name }}</h6>
                                  <p class="text-muted small mb-0">
                                      {{ \Carbon\Carbon::parse($comment_info['comment']->comment_date)->format('d/m/Y') }}
                                  </p>
                              </div>
                          </div>

                          <p class="mt-3 mb-4 pb-2">
                              {!! isset($comment_info['comment']->comment_content) ? $comment_info['comment']->comment_content : 'abc' !!}
                          </p>
                      </div>
                    @endforeach

                  </div>


                  <!-- Post Comment-->
                  <form method = "POST" action ="{{route('upload_comment', ['blog' => $blog->blog_id])}}" id ="commentForm">
                    @csrf
              
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                      <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="{{ $post_information['photo_information'][0]->photo_url }}" alt="avatar" width="40"
                          height="40" />
                        <div class="form-outline w-100">
                          <textarea id="summernote" name="editordata" value ="message"></textarea>
                        </div>
                      </div>
                      <div class="float-end mt-2 pt-1">
                        <button type="button" class="btn btn-primary btn-sm" id ="post_comment" style = "margin-bottom: 10px;">Post comment</button>
                      
                      </div>
                    </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       
        <!-- MDB -->
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
        ></script>
       
        <script>
          $(document).ready(function () {
            $('#summernote').summernote();
        
            // Add click event handler for the submit button
            $('#submit').on('click', function () {
              // Submit the form
              $('form').submit();
            });
          });
        </script>

<script>

  document.getElementById('post_comment').addEventListener('click', function() {
      // Get the form element
      var form = document.getElementById('commentForm');

      // Submit the form
      form.submit();
  });


</script>

    </body>
</html>
