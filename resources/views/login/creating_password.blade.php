<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login/sign_up2.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header">

            <div class="content">
                <img src="https://logos-download.com/wp-content/uploads/2016/06/MyFitnessPal_logo-700x130.png" alt="">
                <h3>Create Your Free Account-Step 2 of 2</h3>
            </div>

            <div class="underline"></div>
        </div>


        <div class="main">
            <div class="main_content">
                <div class="tell_us_about">
                    <h1>Tell Us About Yourself</h1>
                    <p>We will use this information to create a personalized diet and exercise profile for you.</p>
                </div>
                <form action="{{ route("creating_password")}}" method ="POST" id="form">
                            @csrf
                                <div class="details1">
                                    <label>Password: </label>
                                    <input type="password" id="user_weight" name="password">
                                </div> 
                                <br>
                                <div class="details1">
                                    <label>Current Weight : </label>
                                    <input type="Number" id="user_weight" name="weight">
                                    <label>kg</label>
                                </div> 
                                
                                <br>

                                <div class="details2">
                                    <label>Height :</label>
                                    <input type="Number" id="user_height" name ="height">
                                    <label>cm</label>
                                </div>
                                
                                <br>

                                <div class="details3">
                                    <label>Age : </label>
                                    <input type="Number" id="user_age" name ="age">
                                    <label>cm</label>
                                </div>

                                <br>

                                <div class="details4">
                                    <label>Gender :</label>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male">Male</label>
                                
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female">Female</label>
                                
                                    <!-- You can add more options if needed -->
                                </div>
                                
                               <br>

                                <div class="details8">
                                    <label>Name :</label>
                                    <input type="text" id="user_name" name ="user_name">
                                </div>     
                        </div>

                        <!-- ended main content -->

                        <div class="mid_content">
                            <h4>How would you describe your normal daily activities?</h4>
                            <div class="details1">
                                <input type="radio" name="activityLevel" value="Sedentary">
                                <h5>Sedentary</h5>
                                <p>Spend Most of the day sitting (e.g. bank teller, desk job)</p>
                            </div>
                        
                            <div class="details2">
                                <input type="radio" name="activityLevel" value="Lightly Active">
                                <h5>Lightly Active</h5>
                                <p>Spend a good part of the day on your feet (e.g. teacher salesperson)</p>
                            </div>
                        
                            <div class="details3">
                                <input type="radio" name="activityLevel" value="Active">
                                <h5>Active</h5>
                                <p>Spend a good part of the day doing some physical activity (e.g. food server postal carrier)</p>
                            </div>
                        
                            <div class="details4">
                                <input type="radio" name="activityLevel" value="Very Active">
                                <h5>Very Active</h5>
                                <p>Spend a good part of the day doing heavy physical activity (e.g. bike messenger, carpenter)</p>
                            </div>
                        </div>
                        
                        

                            <!-- ----------------------------------------------- -->

                        <br>
                                <button id="sign_up_button" type ="submit">Sign Up</a></button>

                            </div>
                </form>

            </div>

        </div>
    </div>
</body>
</html>