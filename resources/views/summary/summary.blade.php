<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/summary/my-home.css') }}" />
    <title>Document</title>
</head>
<body>
    <div id="container">
        <!-- top navigation bar starts-->

 
     <!-- top navigation bar ends-->
 
     <!-- logo-div starts -->
 
     <div class="header_wrap">
         <div id="logo">
             <a href=""><img src="data:image/png;base64,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" alt = "myfitness home page "/></a>
         </div>
         <div class="header_content">

            @if(isset($gmailName))
            <p>Hi, <a style="margin-left:10px;" id="user_name">{{ $gmailName }}</a></p>
            @elseif(!empty($userData))
            <p>Hi, <a style="margin-left:10px;" id="user_name">{{ $userData->user_name }}</a></p>
            @else
            <p><a style="margin-left:10px;" id="user_name">Hello!</a></p>
            @endif
             <div  class="header_wrap_content">
            
            
                 <a href="{{route('display_profile')}}">Settings</a>
                 <a href="{{route('login')}}">Logout</a>
               
             </div>
         </div>
     </div>
 
     <!-- logo-div ends -->
 
 
     <!-- header_navigation_bar starts -->
     <div class="header__navigation_bar">
         <a href="{{route('meal_plan')}}">FOOD</a>
         <a href = "{{route('chart_calories_default')}}" >REPORTS</a>
         <a href = "{{route('display_blog')}}" >BLOG</a>
         <a href = "{{route('display_supplement')}}" >SUPPLYMENT</a>
     </div>
     <!-- header_navigation_bar ends -->
 
     <!-- header_navigation_sub_bar starts -->

     <!-- header_navigation_sub_bar ends -->

    <!-- My Home Part -- Pranit Jogwe -->
    <div class="myhome" id="myhome">
        <div class="myhome__left">
            <div class="myhome__left_dailySummary">
                <header>
                    <div>
                        <h3>Your Daily Summary</h3>
                        <div id="daywise__dynamic-streak">
                            <div style="font-size: 40px;"></div>
                            <div>
                                Day
                                <br>
                                Streak
                            </div>
                        </div>
                    </div>
                </header>
                <div class="myhome__left_dailySummary_content">
                    <div class="myhome__left_dailySummary_content--left">
                       <div class="myhome__left_dailySummary_content--left-photo">
                            <p style="font-size: 12px;">

                                @if(isset($imageUrl))
                                    <img src={{$imageUrl}} alt="Uploaded Image" width="120px" height="100px">
                                @endif
                                
                            </p>
                            <p style="margin: auto; width: fit-content;">

                                <form id="upload_img_form" action="{{route('upload_img')}}" method="post" style="display: none;" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image" id="image" accept="image/*">
                                </form>
                                    <a id = "upload_img" href="./My Photo/my-photo.html" style="color: rgb(0, 114, 188);font-size: 12px; text-decoration: none; ">
                                        @if(isset($imageUrl))
                                            Edit photo
                                        @else
                                            Upload photo
                                        @endif
                                    </a>

                               
                       </div>
                    </div>
                    <div class="myhome__left_dailySummary_content--right">
                        Calories Remaining
                         <!-- The Modal -->
                            <div id="myModal" class="modal">

                            <!-- Modal content -->
                                <div class="modal-content">
                                    <div class="modal-content__grid1" >
                                        <h3 style="margin: 0; margin-left: 10px;">Select a summary</h3>
                                        <span style="margin: 0;" class="close">&times;</span>
                                    </div>
                                    <div class="modal-content__grid2">
                                        <div class="modal-content__grid2-remain">
                                            <a id="myhome-link" href="./my-home.html" style="color: black;">
                                                <p>Calories For Each User</p>
                                                <span>Food calories, exercise calories and calories remaining</span>
                                            </a>
                                            <hr>
                                        </div>
                                        <div><i class="fa fa-check" style="font-size:20px;color: #0072BC;"></i></div>
                                        <div>
                                            <p>Macronutrients Remaining</p>
                                            <span>Carbohydrates, fat, proteins and calories remaining </span>
                                            <hr>
                                        </div>
                                        <div></div>
                                        <div>
                                            <p>Heart Healthy</p>
                                            <span>Fat, sodium, cholesterol and calories remaining </span>
                                            <hr>
                                        </div>
                                        <div></div>
                                        <div>
                                            <p>Low Carbs</p>
                                            <span>Carbohydrates, sugar, dietary fibre and calories remaining</span>
                                            <hr>
                                        </div>
                                        <div></div>
                                        <div>
                                            <p>Custom Summary</p>
                                            <span>Select any three nutrient that you want to track</span>
                                        </div>
                                        <div></div>
                                    </div>
                              
                                </div>
                        
                            </div>
                        <div class="myhome__left_dailySummary_content--right-btnUpdate">
                            @if (!empty($userData))
                            <div style="font-size:30px; color: rgb(133,196,0); font-weight: 700;">{{ $userData->calories }}</div>
                            @else
                            <div style="font-size:30px; color: rgb(133,196,0); font-weight: 700;">1500</div>
                            @endif
                            <a href="{{route('meal_plan')}}">Add Food</a>
                        </div>
                        <div class="calculation-table">
                            <table style="width: 100%; text-align: left;" >
                                <thead  style=" font-size: 20px;color: #666;margin-bottom: 2px;letter-spacing: 1px">
                                 
                                </thead>
                                <tbody style="font-size: 14px;line-height: 16px; color: #999999;">
                            
                                </tbody>
                            </table>
                        </div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="myhome__left_verifyEmail">
                <div class="myhome__left_verifyEmail--Icon">
                    <i id="envelope-icon" class="fa fa-envelope-o"></i>
                </div>
                <div class="myhome__left_verifyEmail--Content">
                    <h3 style="    color: #0a5282; font-size: 16px;">Don't forget to verify your email.</h3>
                    <p style="font-size: 14px;">
                        We sent an email to:
                        <br>
                        <p><a src="" style="color: rgb(102,126,178);">pranitjogwe49200@gmail.com</a></p>
                    </p>
                </div>
                <div class="myhome__left_verifyEmail--link">
                    <button id="myhome__left_verifyEmail--link-btn"  style="width: 100%; " >Resend Email</button>
                    <p>
                        <a href="C:\Users\Pranit Jogwe\Desktop\MASAI\Project\Find-Your-Fit\My_Fitness_Pal_Clone\email_setting\email_setting.html" style="text-decoration: none; color: #0072BC; text-align: center;">
                            Or, change your<br>
                            email address
                        </a>
                    </p>
                </div>
            </div>
            <div class="myhome__left_newsfeed">
                <header style=" display: flex;">
                    <h2 style="margin: 10px; align-items: center;font-size: 14px; color: #FFFFFF; font-weight: 200;">News Feed</h2>
                </header>
                <div class="myhome__left_newsfeed--content">
                    <textarea id="newsText" placeholder="What's on your mind ?" ></textarea>
                    <button id="newsfeed__share-btn">Share</button>
                </div>
            </div>
            <div class="myhome__blog" id="myhome__blog">
        <!-- Blog is added using the javascript -->
                
            </div>
        </div>
        <div class="myhome__right">
            <div class="myhome__right-complete">    
                <div class="recent-forum-topics" style="font-size: 12px;">
                    <div style="width: 96%; margin-left: 4%; ">
                        <header>
                            <h4 style="margin-bottom:8px; padding-top: 10px; color: #0a5282; font-size: 14px;">Recent Forum Topics</h4>
                            <a>View All</a>
                        </header>
                        <div style="padding-bottom:20px;">
                            <ul style=" padding-left: 15px; line-height: 20px; color: #0072BC;">
                                <li>100lbs gone</li>
                                <li>What Mini Goal is motivating you right now!</li>
                                <li>Day 90/365 Day Challenge Progress</li>
                                <li>2020: Not A Complete Waste</li>
                                <li>What's Your Most Recent NSV</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="myhome__right-complete_bottom">
                    <header style="margin:15px; font-size: 12px;border-bottom: 1px solid rgb(230,230,230); padding-bottom: 10px;">
                    </header>
                    <div >
                        <ul style="list-style-type: none; padding: 0; margin-left: 15px; margin-right: 15px; line-height: 1.5em;">
                            <li>
                                <h3>11 Favorite Recipes of 2020</h3>
                                <p>Some of the best recipes of 2020 gave gourmet life to tried-and-true pantry staples to make the most of pandemic life.</p>
                                <div>Read More</div>
                            </li>
                            <li>
                                <h3>11 Favorite Weight-Loss Stories of 2020</h3>
                                <p>The top weight-loss stories of the year included tips for supporting your metabolism, changing your set point weight and more.</p>
                                <div>Read More</div>
                            </li>
                            <li>
                                <h3>11 Favorite Wellness Stories of 2020</h3>
                                <p>Sleep, inflammation and self-care were the topics of some of the best wellness stories of 2020.</p>
                                <div>Read More</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pranit Part End -->

    <!-- Footer -->
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
    <script src="my-home.js">

    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get elements
            var uploadLink = document.getElementById('upload_img');
            var uploadForm = document.getElementById('upload_img_form');
            var fileInput = document.getElementById('image');

            // Add click event listener to the link
            uploadLink.addEventListener('click', function (event) {
                // Prevent the default link behavior
                event.preventDefault();

                // Trigger click event on the file input
                fileInput.click();
            });

            // Add change event listener to the file input
            fileInput.addEventListener('change', function () {
                // Submit the form when a file is selected
                uploadForm.submit();
            });
        });
    </script>
</body>
</html>