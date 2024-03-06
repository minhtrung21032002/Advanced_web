<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>
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

</head>
<body>
    <form method="POST" action="{{route('upload_comment', ['blog' => $blog])}}">
        @csrf
        <textarea id="summernote" name="editordata"></textarea>
    <button id ="submit" type ="submit" class="btn btn-primary" >Edit 1</button>
    </form>
</body>

</html>