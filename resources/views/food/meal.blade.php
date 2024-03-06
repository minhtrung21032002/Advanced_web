<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Container</title>
    <link rel="stylesheet"  href="{{ asset('css/meal/footer.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/meal/login_header.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/meal/meal.css') }}">
    <!-- Add this script tag in the head of your HTML file -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
</head>
<body>
     <!-- top navigation bar starts-->

     <!-- top navigation bar ends-->
 
     <!-- logo-div starts -->
 
    
     <!-- logo-div ends -->
 
 
     <!-- header_navigation_bar starts -->
     <div class="header__navigation_bar">
         <a href = "{{route('show_information')}}" >MY HOME</a>
         <a href="{{route('display_profile')}}" >SETTING</a>
         <a href = "{{route('chart_calories_default')}}" >REPORTS</a>
    
     </div>
     <!-- header_navigation_bar ends -->
 
     <!-- header_navigation_sub_bar starts -->
     <div class = "header__navggation_sub_bar">
     </div>
     <!-- header_navigation_sub_bar ends -->



                                        <!-- food Conatiner starts -->


    <div class="food">

        <!-- Food_container_first_div starts-->

        <div class="food_firstDiv">
            <h1>Your Food Diary For : </h1>
                  
            <p class="food__firstDiv__date"  id ="date" >
                {{ $date_display }}</p>
        
            <div id="calender" style="position: relative;"><img id ="calendarImage" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-CTz2j_sMgAmRO4uxILnUgoXJ9JJ7vCD_Ng&usqp=CAU" alt="calender" height="50px" width="50px"/></div>
            <form id="dateForm" method="GET" action="{{ route('meal_plan') }}">
                @csrf
                <input type="hidden" name="selectedDate" id="selectedDateInput">
            </form>
            <div id="main_calender"></div>
        </div>
      

        <!-- Food_container_first_div starts-->

        <!-- Food_container_table starts -->

        <div class="table">
            <table>
                <tr class="meal_header">
                    <td class="td_first">Breakfast</td>
                    <td class="td_first_column">
                        <div>Calories</div>
                        <div style="opacity: 0.7;">kCal</div>
                    </td>
                    <td class="td_first_column">
                        <div>Carbs</div>
                        <div style="opacity: 0.7;">g</div>
                    </td>
                    <td class="td_first_column">
                        <div>Fat</div>
                        <div style="opacity: 0.7;">g</div>
                    </td>
                    <td class="td_first_column">
                        <div>Protein</div>
                        <div style="opacity: 0.7;">g</div>
                    </td>
                   
                </tr>
               
            </table>
            @if(!empty($breakfast))
            <table  class="food_info_table">
                @foreach($breakfast as $index => $meal)
                    <tr>
                            <td class = "food_info_first_td">{{ $meal->food_name }}</td>
                            <td class = "food_info_third_td">{{ $meal->calories }}</td>
                            <td class = "food_info_third_td">{{ $meal->carb }}</td>
                            <td class = "food_info_third_td">{{ $meal->fat }}</td>
                            <td class = "food_info_third_td">{{ $meal->protein }}</td>
                            <form id="deleteFormBreakfast{{$loop->index + 1}}" action = "{{route('delete_food')}}" method = "POST">
                                @csrf 
                                <input type="hidden" name="date_id"  value="{{ $meal->date_id }}">
                                <input type="hidden" name="food_name" id="foodNameInput" value="{{ $meal->food_name }}">
                                <input type="hidden" name="meal_name" id="mealNameInput" value="breakfast">
                                <td><img style = "margin-bottom : 10px; margin-left : 30px" onClick = "deleteItemAndSubmitForm('deleteFormBreakfast{{$loop->index + 1}}')" src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfFXtoPSkM8Rvgk6rcrzGNbI_RonsKQ7Q8-A&usqp=CAU" height = "20px" , width = "20px"/></td>
                            </form>
                        <!-- Add other columns as needed -->
                    </tr>
                @endforeach
            </table>
             @endif

            <table>
                <tr class="bottom">
                     <td class="bottom_td"><a href="{{ route('add_food', ['meal' => 'breakfast']) }}">Add food</a>
                     </td>
            
                 </tr>
            </table>

            
            <div class="line"></div>

            <table>
                <tr>
                    <td class="td_first">Lunch</td>
                </tr>
            </table>


            @if(!empty($lunch))
            <table  class="food_info_table">
                @foreach($lunch as $index => $meal)
                    <tr>
                            <td class = "food_info_first_td">{{ $meal->food_name }}</td>
                            <td class = "food_info_third_td">{{ $meal->calories }}</td>
                            <td class = "food_info_third_td">{{ $meal->carb }}</td>
                            <td class = "food_info_third_td">{{ $meal->fat }}</td>
                            <td class = "food_info_third_td">{{ $meal->protein }}</td>
                            <form id="deleteFormLunch{{$loop->index + 1}}" action = "{{route('delete_food')}}" method = "POST">
                                @csrf
                                <input type="hidden" name="date_id"  value="{{ $meal->date_id }}">
                                <input type="hidden" name="food_name" id="foodNameInput" value="{{ $meal->food_name }}">
                                <input type="hidden" name="meal_name" id="mealNameInput" value="lunch">
                                <td><img style = "margin-bottom : 10px; margin-left : 30px" onClick = "deleteItemAndSubmitForm('deleteFormLunch{{$loop->index + 1}}')" src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfFXtoPSkM8Rvgk6rcrzGNbI_RonsKQ7Q8-A&usqp=CAU" height = "20px" , width = "20px"/></td>
                            </form>
                        <!-- Add other columns as needed -->
                    </tr>
                @endforeach
            </table>
            @endif
             

            <table>
                <tr class="bottom">
                     <td class="bottom_td"><a href="{{ route('add_food', ['meal' => 'lunch']) }}">Add food</a>
                     </td>
            

                 </tr>
            </table>


            <div class="line"></div>
            <table>
                <tr>
                    <td class="td_first">Dinner</td>
                </tr>
            </table>


            @if(!empty($dinner))
            <table  class="food_info_table">
                @foreach($dinner as $meal)
                    <tr>
                            <td class = "food_info_first_td">{{ $meal->food_name }}</td>
                            <td class = "food_info_third_td">{{ $meal->calories }}</td>
                            <td class = "food_info_third_td">{{ $meal->carb }}</td>
                            <td class = "food_info_third_td">{{ $meal->fat }}</td>
                            <td class = "food_info_third_td">{{ $meal->protein }}</td>
                            <form id="deleteForm3" action = "{{route('delete_food')}}" method = "POST">
                                @csrf
                                <input type="hidden" name="date_id"  value="{{ $meal->date_id }}">
                                <input type="hidden" name="food_name" id="foodNameInput" value="{{ $meal->food_name }}">
                                <input type="hidden" name="meal_name" id="mealNameInput" value="dinner">
                                <td><img style = "margin-bottom : 10px; margin-left : 30px" onClick = "deleteItemAndSubmitForm('deleteForm3')" src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfFXtoPSkM8Rvgk6rcrzGNbI_RonsKQ7Q8-A&usqp=CAU" height = "20px" , width = "20px"/></td>
                            </form>
                        <!-- Add other columns as needed -->
                    </tr>
                @endforeach
            </table>
            @endif
             

            <table>
                <tr class="bottom">
                     <td class="bottom_td"><a href="{{ route('add_food', ['meal' => 'dinner']) }}">Add food</a>
                     </td>
            
                 </tr>
            </table>

            <div class="line"></div>


            <table>
                <tr>
                    <td class="td_first">Snack</td>
                </tr>
            </table>


             @if(!empty($snack))
            <table  class="food_info_table">
                @foreach($snack as $meal)
                    <tr>
                            <td class = "food_info_first_td">{{ $meal->food_name }}</td>
                            <td class = "food_info_third_td">{{ $meal->calories }}</td>
                            <td class = "food_info_third_td">{{ $meal->carb }}</td>
                            <td class = "food_info_third_td">{{ $meal->fat }}</td>
                            <td class = "food_info_third_td">{{ $meal->protein }}</td>
                            <form id="deleteForm4" action = "{{route('delete_food')}}" method = "POST">
                                @csrf
                                <input type="hidden" name="date_id"  value="{{ $meal->date_id }}">
                                <input type="hidden" name="food_name" id="foodNameInput" value="{{ $meal->food_name }}">
                                <input type="hidden" name="meal_name" id="mealNameInput" value="snack">
                                <td><img style = "margin-bottom : 10px; margin-left : 30px" onClick = "deleteItemAndSubmitForm('deleteForm4')" src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfFXtoPSkM8Rvgk6rcrzGNbI_RonsKQ7Q8-A&usqp=CAU" height = "20px" , width = "20px"/></td>
                            </form>
                        
                    </tr>
                @endforeach
            </table>
            @endif
             

            
            <table>
                   <tr class="bottom">
                        <td class="bottom_td"><a href="{{ route('add_food', ['meal' => 'snack']) }}">Add food</a>
                        </td>
               
                    </tr>
            </table>
            
        </div>
    </div>

                                    <!-- Food_container_table ends -->

                                     <!-- Food_container_total starts -->

    <table class="table_total">
        <tr>
            <td class="total_value" >Total</td>
            <td class="total_text"id="total_food_taken">{{$totalAllMeals->totalCalories}}</td>
            <td class="total_text">{{$totalAllMeals->totalCarbs}}</td>
            <td class="total_text">{{$totalAllMeals->totalFat}}</td>
            <td class="total_text">{{$totalAllMeals->totalProtein}}</td>
        </tr>
        <tr>
            <td class="total_value">Your Daily Goal</td>
            <td class="total_text">{{$targetMacronutrients-> targetCalories}}</td>
            <td class="total_text">{{ $targetMacronutrients->targetCarb }}</td>
            <td class="total_text">{{ $targetMacronutrients->targetFat }}</td>
            <td class="total_text">{{ $targetMacronutrients->targetProtein }}</td>


        </tr>
        <tr>
               <td class="total_value" style="color: {{$remainingNutrients->remainingCalories < 0 ? 'red' : 'green'}};">Remaining</td>
                <td class="total_text" style="color: {{$remainingNutrients->remainingCalories < 0 ? 'red' : 'green'}};">{{$remainingNutrients->remainingCalories}}</td>
                <td class="total_text" style="color: {{$remainingNutrients->remainingCarb < 0 ? 'red' : 'green'}};">{{$remainingNutrients->remainingCarb}}</td>
                <td class="total_text" style="color: {{$remainingNutrients->remainingFat < 0 ? 'red' : 'green'}};">{{$remainingNutrients->remainingFat}}</td>
                <td class="total_text" style="color: {{$remainingNutrients->remainingProtein < 0 ? 'red' : 'green'}};">{{$remainingNutrients->remainingProtein}}</td>

        </tr>
        <tr style="height: 20px;"></tr>
        <tr>
            <td class="td_first"></td>
                    <td class="td_first_column">
                        <div>Calories</div>
                        <div style="opacity: 0.7;">kCal</div>
                    </td>
                    <td class="td_first_column">
                        <div>Carbs</div>
                        <div style="opacity: 0.7;">g</div>
                    </td>
                    <td class="td_first_column">
                        <div>Fat</div>
                        <div style="opacity: 0.7;">g</div>
                    </td>
                    <td class="td_first_column">
                        <div>Protein</div>
                        <div style="opacity: 0.7;">g</div>
                    </td>
        </tr>
    </table>

                                <!-- Food_container_total ends -->

                               <!-- Water consumption block starts -->


                                 <!-- Water consumption block starts -->

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
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

<script>
    function deleteItemAndSubmitForm(formId) {
        document.getElementById(formId).submit();
    }
</script>
<script>
      document.addEventListener('DOMContentLoaded', function () {
        var calendarImage = document.getElementById('calendarImage');
        var selectedDateInput = document.getElementById('selectedDateInput');
        var dateForm = document.getElementById('dateForm');

        console.log(calendarImage)
        console.log(selectedDateInput)
        console.log(dateForm)
       
        // Initialize Pikaday
        var picker = new Pikaday({
                field: calendarImage,
                format: 'D MMM YYYY', // Adjust the format as needed
                yearRange: [1900, new Date().getFullYear()],
                onSelect: function () {
                    selectedDateInput.value = picker.toString('YYYY-MM-DD');
                    dateForm.submit();
                },
        });

        // Show the date picker when clicking on the calendar image
        calendarImage.addEventListener('click', function () {
            picker.show()
        });
      });
</script>

</html>
