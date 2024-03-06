<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Login_Header.css">
    <link rel="stylesheet" href="Add_food.css">
    <link rel="stylesheet" href="Footer.css">
    <link rel="stylesheet"  href="{{ asset('css/meal/login_header.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/meal/add_food.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/meal/footer.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


</head>
<body>

    <!-- top navigation bar starts-->


    <!-- top navigation bar ends-->

    <!-- logo-div starts -->

    <div class="header_wrap">
        <div id="logo">
            <a href="http://www.myfitnesspal.com/"><img src="data:image/png;base64,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" alt = "myfitness home page "/></a>
        </div>
        <div class="header_content">
            <p>Hi, <a style="margin-left:10px ;">username</a></p>
            <div  class="header_wrap_content">
                <div class="message" ><a><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQ5-ACdx9CAJYIT4x86KYaEzE1wJfsKBBv_g&usqp=CAU"/></a></div>
                <div style="background-color: tomato;border-radius: 5px;height: 15px;width: 15px;margin-top:7px ;"><p style="color: white;text-align: center;"></p></div>
                <div class="icons"><img src="data:image/png;base64,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"alt = "user"/></div>
                <div style="background-color:grey;border-radius: 5px;height: 15px;width: 15px;margin-top:7px ;"><p style="color: white;text-align: center;"></p></div>
                <a href="">Help</a>
                <a href="">Settings</a>
                <a href="../Loginpage/Login.html">Logout</a>
                <a>Followus :</a>
                <div class="icons" ><a ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRffWo3TdZd-FULexnuI7vbB0WoSGhco7Xeeg&usqp=CAU" alt="facebook"/></a></div>
                <div style=" width: 20px; height: 20px;" ><a ><img class="icons" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREpL-VV2vY_owK7QPN2rM9205Ld_RHgH_SDw&usqp=CAU"alt ="twitter" style="margin-bottom:15px ;"/></a></div>
            </div>
        </div>
    </div>

    <!-- logo-div ends -->


    <!-- header_navigation_bar starts -->
    <div class="header__navigation_bar">
        <a href = "{{route('chart_calories_default')}}" >REPORTS</a>
         <a href = "{{route('display_blog')}}" >BLOG</a>
         <a href = "{{route('display_supplement')}}" >SUPPLYMENT</a>
     
    </div>
    <!-- header_navigation_bar ends -->

    <!-- header_navigation_sub_bar starts -->
   
                                    <!-- header_navigation_sub_bar ends -->

                                   <!-- add food page container starts here -->


    <div class="food_container">
        <h2>Add Food To Breakfast</h2>
        <div class="line"></div>
        <div style="display: flex;">
            <h3>Search our food database by name:</h3>
            <p style="margin-left: 50px; color: #0072BC;margin-top: 25px;font-size: 13px;">Quick Add Clories</p>
        </div> 

        <form action ="{{route('search_food')}}" method ="POST">
            @csrf
            <div style="display: flex;">
                <input type="text" id="food_input" name="food_name"/>
                <button class="food_container__search_button">Search</button>
            </div>

                <div style="display: flex;margin-top: 20px;">
                </div>
        </form>
        <div style="display: flex;">
            <div class="food_show_div">
                <p id="exercise_show">You have not added any breakfast yet.</p>
                <ul id="food_information"></ul>
                <p style="width: 3000px;"><b>TIP:</b> As you enter foods to your food diary, the foods you've eaten most recently will appear in this list so that you can quickly add them <br/>to your meals.</p>
            </div>
            
                
          
        </div>
        <div style="display: flex;">
            <div class="food_show_div">
                @if(isset($foodResults))
                    @foreach($foodResults as $foodResult)
                        <div class="food-item" data-toggle="modal" data-target="#foodModal{{$loop->iteration}}">
                            <ul>
                                <li><b>Name:</b> {{ $foodResult['name'] }}</li>
                                <li><b>Carb:</b> {{ $foodResult['carb'] }}</li>
                                <li><b>Protein:</b> {{ $foodResult['protein'] }}</li>
                                <li><b>Fat:</b> {{ $foodResult['fat'] }}</li>
                            </ul>
                        </div>
        
                        <!-- Modal -->
                        <div class="modal fade" id="foodModal{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="foodModalLabel{{$loop->iteration}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="foodModalLabel{{$loop->iteration}}">Enter Quantity</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method ="POST" action = "{{route('food_added')}}">

                                            @csrf
                                            <div class="modal-body">
                                                <!-- Add a form or input to get the quantity -->
                                                <div style="display: flex; flex-direction: column;">
                                                    <input type="hidden" name="food_name" value="{{ $foodResult['name'] }}">
                                                    <input type="hidden" name="protein" value="{{ $foodResult['protein'] }}">
                                                    <input type="hidden" name="carb" value="{{ $foodResult['carb'] }}">
                                                    <input type="hidden" name="fat" value="{{ $foodResult['fat'] }}">
                                        
                                                    <p><b>Food Name:</b> {{ $foodResult['name'] }}</p>
                                                
                                                    <label for="quantity">Quantity:</label>
                                                    <input type="text" id="quantity" name="quantity">
                                                    <br>

                                                    <label for="input_date">Date:</label>
                                                    <input type="date" id="input_date" name="input_date" required value ="Y-M-D">

                                                   
                                                    <br>
                                                
                                                    <label for="meal">To Which Meal:</label>
                                                    <select id="meal" name="meal">
                                                        <option value="breakfast">Breakfast</option>
                                                        <option value="lunch">Lunch</option>
                                                        <option value="dinner">Dinner</option>
                                                        <option value="snack">Snack</option>
                                                    </select>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- Add a button to add the food to the diary with the selected quantity -->
                                                <button type="submit" class="btn btn-primary">Add to Diary</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p id="exercise_show">You have not added any breakfast yet.</p>
                @endif
            </div>
        </div>
        
        
        <div style="display: flex;">
  
        </div>
        <div  id="food_form_container"></div>
    </div>
                             <!-- add food page container ends here -->

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
                            
</body>
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
            document.addEventListener('DOMContentLoaded', function () {
        // Set the current date when the form is loaded
                const inputDateElement = document.getElementById('inputDate');
                if (inputDateElement) {
                    inputDateElement.value = getCurrentDate();
                }
            });

            function getCurrentDate() {
                const currentDate = new Date();
                const year = currentDate.getFullYear();
                const month = String(currentDate.getMonth() + 1).padStart(2, '0');
                const day = String(currentDate.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            }
    </script>
</html>
