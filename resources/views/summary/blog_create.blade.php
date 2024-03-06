<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"  href="{{ asset('css/summary/blog_create.css') }}">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
    
</head>

  

<body>
    <!-- MultiStep Form -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" method="POST" action="{{route('blog_create')}}" enctype=multipart/form-data>
            @csrf
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Blog Information</li>
                <li>Paragraph 1</li>
                <li>Paragraph 2</li>
                <li>Paragraph 3</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Blog Details</h2>
                <h3 class="fs-subtitle">Tell us about your blog</h3>
                <input type="text" name="blog_title" placeholder="Blog Title"/>
                <h2 class="fs-title" style ="color:red">Your Blog Image</h2>
                <br>
                <img src ="https://cdn-icons-png.flaticon.com/512/1789/1789288.png" width="200px" height ="300px" id="img_upload1" onclick="selectImage('img_input1', 'img_upload1');">
                <input type="file" id="img_input1" name="blog_img" accept="image/*" style="display:none">
                <br>
                <br>
                <input type="button" name="next" class="next action-button" value="Next"/>


            </fieldset>
            <fieldset>
                <h2 class="fs-title">Your Blog Content</h2>
                <h3 class="fs-subtitle">Paragraph number 1</h3>
                <input type="text" name="paragraph_title1" placeholder="Paragraph Title"/>
                <textarea name="paragraph_content1" placeholder="Paragraph Content"></textarea>
                <h2 class="fs-title" style ="color:red">Paragraph Image</h2>
                <img src ="https://png.pngtree.com/png-clipart/20230811/original/pngtree-reportage-article-icon-color-flat-picture-image_7868100.png" width="200px" height ="300px" id="img_upload2" onclick="selectImage('img_input2', 'img_upload2');">
                <input type="file" id="img_input2" name="paragraph_image1" accept="image/*" style="display:none">
                <br>
                <br>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Your Blog Content</h2>
                <h3 class="fs-subtitle">Paragraph number 2</h3>
                <input type="text" name="paragraph_title2" placeholder="Paragraph Title"/>
                <textarea name="paragraph_content2" placeholder="Paragraph Content"></textarea>
                <h2 class="fs-title" style ="color:red">Paragraph Image</h2>
                <img src ="https://png.pngtree.com/png-clipart/20230811/original/pngtree-reportage-article-icon-color-flat-picture-image_7868100.png" width="200px" height ="300px" id="img_upload3" onclick="selectImage('img_input3', 'img_upload3');">
                <input type="file" id="img_input3" name="paragraph_image2" accept="image/*" style="display:none">
                <br>
                <br>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button " value="Next"/>
           
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Your Blog Content</h2>
                <h3 class="fs-subtitle">Paragraph number 3</h3>
                <input type="text" name="paragraph_title3" placeholder="Paragraph Title"/>
                <textarea name="paragraph_content3" placeholder="Paragraph Title"></textarea>
                <h2 class="fs-title" style ="color:red">Paragraph Image</h2>
                <img src ="https://png.pngtree.com/png-clipart/20230811/original/pngtree-reportage-article-icon-color-flat-picture-image_7868100.png" width="200px" height ="300px" id="img_upload4" onclick="selectImage('img_input4', 'img_upload4');">
                <input type="file" id="img_input4" name="paragraph_image3" accept="image/*" style="display:none">
                <br>
                <br>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        </form>
        <!-- link to designify.me code snippets -->

        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->
</body>
<script>

    
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
    console.log("submit")
    $("#msform").submit();
})




</script>


<script>
   function selectImage(imgInputId, imgUploadId) {
  // Trigger the file input when the image is clicked
  document.getElementById(imgInputId).click();

  // Listen for the change event on the file input
  document.getElementById(imgInputId).addEventListener('change', function () {
    // Get the selected file
    var file = this.files[0];

    if (file) {
      // Create a FileReader to read the file
      var reader = new FileReader();

      reader.onload = function (e) {
        // Update the src attribute of the image with the selected image
        document.getElementById(imgUploadId).src = e.target.result;
        document.getElementById(imgInputId).value = file.name;
      };

      // Read the file as a data URL
      reader.readAsDataURL(file);
    }
  });
}



   
</script>
</html>