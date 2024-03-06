<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Login_Header.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="Footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"  href="{{ asset('css/meal/footer.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/meal/login_header.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/summary/profile.css') }}">
</head>
<body>

    <div id="container">
        <!-- top navigation bar starts-->

    <div class="top_nav_bar">

     </div>
 
     <!-- top navigation bar ends-->
 
     <!-- logo-div starts -->
 
     <div class="header_wrap">
         <div id="logo">
             <a href="http://www.myfitnesspal.com/"><img src="data:image/png;base64,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" alt = "myfitness home page "/></a>
         </div>
         <div class="header_content">
            <div  class="header_wrap_content">
            
                <a href="{{route('display_profile')}}">Settings</a>
                <a href="{{route('login')}}">Logout</a>
                <a>Followus:</a>
                <div class="icons" ><a href ="https://www.facebook.com/profile.php?id=100007941076650"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRffWo3TdZd-FULexnuI7vbB0WoSGhco7Xeeg&usqp=CAU" alt="facebook"/></a></div>
            
            </div>
        </div>
     </div>
 
     <!-- logo-div ends -->
 
 
     <!-- header_navigation_bar starts -->
     <div class="header__navigation_bar">
        <a href = "{{route('process.login')}}" >MY HOME</a>
        <a href = "{{route('meal_plan')}}" >FOOD</a>
    </div>
     <!-- header_navigation_bar ends -->
 
     <!-- header_navigation_sub_bar starts -->
     <div class = "header__navggation_sub_bar">

        
     </div>
     <!-- header_navigation_sub_bar ends -->
     <!-- Profile page starts from here -->

    <div class="profile_container">
        <h2 id="user_name_profile"> Profile</h2>
        <div class="profile_info_container">
            @if(isset($imageUrl))
                <img style="padding-left: 20px;padding-bottom: 150px;width: 300px" src="{{$imageUrl}}" alt="No photo">
            @endif
            <div class="profile_info">
                @if($userData)
                    <h3 id="user_name">Name: {{ $userData->user_name }}</h3>
                    <h5 id="gender">Gender: {{ $userData->gender }}</h5>
                    <h5 id="weight">Weight: {{ $userData->weight }}</h5>
                    <h5 id="height">Height: {{ $userData->height }}</h5>
                    <h5 id="age">Age: {{ $userData->age }}</h5>
                    <h5 id="activity_level">Activity Level: {{ $userData->activity_level }}</h5>
                @endif
                <div>
                    <button class="edit_profile_button" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>
                </div>
                <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- Add your input fields here for user to edit -->
                          <!-- Example: -->

                          <form method ="POST" action ="{{route("edit_profile")}}">

                            @csrf
                          <label for="editName">Name:</label>
                          <input type="text" name="user_name" class="form-control" >
                        
                          <label>Gender :</label>
                          <br>
                          <input type="radio" id="male" name="gender" value="male">
                          <label for="male">Male</label>
                          <br>
                          <input type="radio" id="female" name="gender" value="female">
                          <label for="female">Female</label>

                          <fieldset>
                            <label>Activity Level :</label>
                            <br>
                            <input type="radio" id="sedentary" name="activityLevel" value="Sedentary">
                            <label for="sedentary">Sedentary</label>
                            <br>
                            <input type="radio" id="lightly_active" name="activityLevel" value="Lightly Active">
                            <label for="lightly_active">Lightly Active</label>
                            <br>
                            <input type="radio" id="active" name="activityLevel" value="Active">
                            <label for="active">Active</label>
                            <br>
                            <input type="radio" id="very_active" name="activityLevel" value="Very Active">
                            <label for="very_active">Very Active</label>
                        </fieldset>




                          <label for="editName">Weight:</label>
                          <input type="text" name ="weight" class="form-control" >
                          
                          <label for="editGender">Height:</label>
                          <input type="text" name ="height" class="form-control">

                          <label for="editGender">Age:</label>
                          <input type="text" name ="age" class="form-control">
                          <!-- Add similar input fields for other profile information -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
                          </div>
                            </form>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  
                
            </div>
        </div>
       
                                     <!-- profile section ends here -->
 <!-- footer starts here  -->


 <div class="footer">
    <div class="footer_upper_content">
        <a href="">Calorie Counter</a>
        <a href="">Blog</a>
        <a href="">Terms</a>
        <a href="">Privacy</a>
        <a href="">Contact Us</a>
        <a href="">API</a>
        <a href="">Jobs</a>
        <a href="">Feedback</a>
        <a href="">Community</a>
        <a href="">Guidelines</a>
        <select style="margin-left: 150px;">
            <option value="0">English</option>
            <option value="1">Dutch</option>
            <option value="2">Spanish</option>
            <option value="3">Espanol</option>
            <option value="4">Svensik</option>
        </select>
    </div>
    <div  class="footer_upper_content"><a>AdChoices</a></div>
    <div  class="footer_lower_content"><a>&copy;MyFitnessPal, INC</a></div>
    
</div>

<!-- footer ends here  -->
<script src="profile.js">

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
