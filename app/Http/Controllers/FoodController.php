<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use DateTime;
use Carbon\Carbon;

class FoodController extends Controller
{
    public function search_food(Request $request)
    {
        $food_name = $request->input('food_name');
        $api_key = 'hlfe3PuKcwCAuxigHhgI6DSm8L0h0YIXiR3EdUtz';
        $api_url = "https://api.nal.usda.gov/fdc/v1/foods/search";

        $client = new Client();
        $response = $client->request('GET', $api_url, [
            'query' => [
                'api_key' => $api_key,
                'query' => $food_name,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Extract relevant information
        $foodResults = [];

        if (isset($data['foods'])) {
            foreach ($data['foods'] as $food) {
                // Use the food name as the key to check for duplicates
                $foodName = $food['description'];
                
                if (!isset($foodResults[$foodName])) {
                    $foodDetails = [
                        'name' => $foodName,
                        'protein' => $this->getNutrientValue($food, 'Protein'),
                        'carb' => $this->getNutrientValue($food, 'Carbohydrate, by difference'),
                        'fat' => $this->getNutrientValue($food, 'Total lipid (fat)'),
                    ];

                    $foodResults[$foodName] = $foodDetails;
                }
            }
        }

        // Pass the extracted data to the view
        return view('food/add_food', compact('foodResults'));
    }

    private function getNutrientValue($food, $nutrientName)
    {
        if (isset($food['foodNutrients'])) {
            foreach ($food['foodNutrients'] as $nutrient) {
                if (stripos($nutrient['nutrientName'], $nutrientName) !== false) {
                    return $nutrient['value'];
                }
            }
        }

        return null;
    }


public function food_added(Request $request)
{

    //default today
    // user select the day
    //display 
    try {
        // Retrieve data from the request
        $quantity = $request->input('quantity');
        $meal = $request->input('meal');
        $food_name = $request->input('food_name');
        $protein = $request->input('protein');
        $carb = $request->input('carb');
        $fat = $request->input('fat');
        $date_input = request('input_date');
        $dateObject = new DateTime($date_input);
        $inputDate = $dateObject->format('Y-m-d');
        //retrive the date 

        // make insert in date table

        // retrive date_id

        // insert to junction table with date_id corresponding to that user with that particular meal 
        // Calculate calories
        $calories = ((4 * $protein) + (4 * $carb) + (9 * $fat));

        // Retrieve email from the session
        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

        $existingFood = DB::select("SELECT * FROM food WHERE food_name = ?", [$food_name]);
        $existingDate = DB::select('SELECT * FROM dates WHERE full_date = ?', [$inputDate]);


        if (empty($existingFood)) {
            DB::statement("INSERT INTO food (food_name, protein, carb, fat,calories) VALUES (?, ?, ?, ?, ?)", [$food_name, $protein, $carb, $fat, $calories]);
        }

        if (empty($existingDate)) {
            // If the record doesn't exist, insert it
            DB::insert('INSERT INTO dates (full_date) VALUES (?)', [$inputDate]);
        }
        $dateId = DB::select("SELECT date_id FROM dates WHERE full_date = ?", [$inputDate]);
        $dateId = $dateId[0]->date_id; // Assuming it returns a single result


        $foodId = DB::select("SELECT food_id FROM food WHERE food_name = ?", [$food_name]);
        $foodId = $foodId[0]->food_id; // Assuming it returns a single result
  
       // $foodId = DB::select("SELECT food_id FROM food WHERE food_name = ?", [$food_name]);
        //$foodId = DB::select("SELECT LAST_INSERT_ID() as food_id")[0]->food_id;

        // Select User_id using Gmail
        $userId = DB::select("SELECT user_id FROM user WHERE email = ?", [$email]);
        $userId = $userId[0]->user_id; // Assuming it returns a single result

        // Select Meal_id using Meal_name
        $mealId = DB::select("SELECT meal_id FROM meal WHERE meal_name = ?", [$meal]);
        $mealId = $mealId[0]->meal_id; // Assuming it returns a single result


        $existingRecord = DB::select("
                SELECT quantity
                FROM junction_table
                WHERE food_id = ? AND user_id = ? AND meal_id = ? AND date_id = ?
            ", [$foodId, $userId, $mealId, $dateId]);

        if (!empty($existingRecord)) {
                // If a record exists, update the quantity
                $currentQuantity = $existingRecord[0]->quantity;
                $newQuantity = $currentQuantity + $quantity;
            
                DB::statement("
                    UPDATE junction_table
                    SET quantity = ?
                    WHERE food_id = ? AND user_id = ? AND meal_id = ? AND date_id = ?
                ", [$newQuantity, $foodId, $userId, $mealId, $dateId]);
            } else {
                // If no record exists, insert a new record
                DB::statement("
                    INSERT INTO junction_table (food_id, user_id, meal_id, quantity, date_id)
                    VALUES (?, ?, ?, ?, ?)
                ", [$foodId, $userId, $mealId, $quantity, $dateId]);
            }
        
        return Redirect::route('meal_plan');

    } catch (QueryException $e) {
        // Handle the exception
        dd("Database Error: " . $e->getMessage());
    } catch (\Exception $e) {
        // Handle other exceptions
        dd("Error: " . $e->getMessage());
    }
}   


    public function display_foods(Request $request){
        $input_date = $request->input('selectedDate');
        $dateId;
        $date_display;
        if (!empty($input_date)) {
            $formattedDate = Carbon::parse($input_date)->toDateString();
            $date_display = $formattedDate;
            $dateId = DB::select("SELECT date_id FROM dates WHERE full_date = ?", [$formattedDate]);
            if(empty($date_id)){
                DB::insert("INSERT INTO dates (full_date) VALUES (?)", [$formattedDate]);
                $dateIdResult = DB::select("SELECT date_id FROM dates WHERE full_date = ?", [$formattedDate]);
            }
            $dateId = $dateIdResult[0]->date_id; // Assuming it returns a single result
        }
        else{
            $default_date = now()->format('Y-m-d');
            $date_display = $default_date;
            $dateId = DB::select("SELECT date_id FROM dates WHERE full_date = ?", [$date_display]);
            if(empty($dateId)){
                DB::insert("INSERT INTO dates (full_date) VALUES (?)", [$date_display]);
                $dateId = DB::select("SELECT date_id FROM dates WHERE full_date = ?", [$date_display]);
            }
            $dateId = $dateId[0]->date_id; // Assuming it returns a single result
        }
    
        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $userId = DB::select("SELECT user_id FROM user WHERE email = ?", [$email]);
        $userCalories = DB::select("SELECT calories FROM user WHERE email = ?", [$email]);

        $foodId = DB::select("SELECT LAST_INSERT_ID() as food_id")[0]->food_id;
        $userId = $userId[0]->user_id; // Assuming it returns a single result

        $results = DB::select("
            SELECT
                j.date_id,
                j.food_id,
                j.quantity,
                f.food_name,
                f.protein,
                f.carb,
                f.fat,
                f.calories,
                m.meal_name
            FROM
                junction_table j
            JOIN
                meal m ON j.meal_id = m.meal_id
            JOIN
                food f ON j.food_id = f.food_id
            WHERE
                j.user_id = :user_id
                AND j.date_id = :date_id
        ", ['user_id' => $userId, 'date_id' => $dateId]);
    $breakfast = [];
    $lunch = [];
    $dinner = [];
    $snack = [];
    foreach ($results as $result) {
        switch ($result->meal_name) {
            case 'breakfast':
                $breakfast[] = $result;
                break;
            case 'lunch':
                $lunch[] = $result;
                break;
            case 'dinner':
                $dinner[] = $result;
                break;
            case 'snack':
                $snack[] = $result;
                break;
            // Add more cases if needed for other meal categories
        }
    }

        $this->updateCaloriesForMeal($breakfast);
        $this->updateCaloriesForMeal($lunch);
        $this->updateCaloriesForMeal($dinner);
        $this->updateCaloriesForMeal($snack);

        $totalCaloriesBreakfast = $this->calculateTotalCalories($breakfast);
        $totalCaloriesLunch = $this->calculateTotalCalories($lunch);
        $totalCaloriesDinner = $this->calculateTotalCalories($dinner);
        $totalCaloriesSnack = $this->calculateTotalCalories($snack);


        $totalAllMeals = $this->calculateTotalAllMeals(
            $totalCaloriesBreakfast,
            $totalCaloriesLunch,
            $totalCaloriesDinner,
            $totalCaloriesSnack
        );
        $targetMacronutrients = $this->calculateMacronutrientTargets($email);

        $remainingNutrients = $this->calculateRemainingNutrients($totalAllMeals, $targetMacronutrients);
        return view('food/meal', compact('breakfast', 'lunch', 'dinner', 'snack', 'totalAllMeals','targetMacronutrients','remainingNutrients','date_display'));
    }


    
    public function updateCaloriesForMeal(array $meal)
    {
    foreach ($meal as $food) {
        $newCalories = $food->quantity * $food->calories;
        $newProtein = $food->quantity * $food->protein;
        $newCarbs = $food->quantity * $food->carb;
        $newFat = $food->quantity * $food->fat;
        // Update the database with the new calories value
        // Update the calories property in the $meal array
        $food->calories = $newCalories;
        $food->protein = $newProtein;
        $food->carbs = $newCarbs;
        $food->fat = $newFat;
    }
    }


    public function calculateTotalCalories($meal)
    {
        $totalNutrients = (object) [
            'totalCalories' => 0,
            'totalCarbs' => 0,
            'totalFat' => 0,
            'totalProtein' => 0,
        ];
        
        foreach ($meal as $food) {
            // Assuming $food->quantity and $food->calories are columns in your database
            $totalNutrients->totalCalories +=  $food->calories;
            $totalNutrients->totalCarbs +=  $food->carb;
            $totalNutrients->totalFat +=  $food->fat;
            $totalNutrients->totalProtein +=  $food->protein;
        }

        return $totalNutrients;
    }



    public function calculateTotalAllMeals($totalCaloriesBreakfast, $totalCaloriesLunch, $totalCaloriesDinner, $totalCaloriesSnack)
{
    $totalAllMeals = (object) [
        'totalCalories' => 0,
        'totalCarbs' => 0,
        'totalFat' => 0,
        'totalProtein' => 0,
    ];

    $totalAllMeals->totalCalories += $totalCaloriesBreakfast->totalCalories;
    $totalAllMeals->totalCarbs += $totalCaloriesBreakfast->totalCarbs;
    $totalAllMeals->totalFat += $totalCaloriesBreakfast->totalFat;
    $totalAllMeals->totalProtein += $totalCaloriesBreakfast->totalProtein;

    $totalAllMeals->totalCalories += $totalCaloriesLunch->totalCalories;
    $totalAllMeals->totalCarbs += $totalCaloriesLunch->totalCarbs;
    $totalAllMeals->totalFat += $totalCaloriesLunch->totalFat;
    $totalAllMeals->totalProtein += $totalCaloriesLunch->totalProtein;

    $totalAllMeals->totalCalories += $totalCaloriesDinner->totalCalories;
    $totalAllMeals->totalCarbs += $totalCaloriesDinner->totalCarbs;
    $totalAllMeals->totalFat += $totalCaloriesDinner->totalFat;
    $totalAllMeals->totalProtein += $totalCaloriesDinner->totalProtein;

    $totalAllMeals->totalCalories += $totalCaloriesSnack->totalCalories;
    $totalAllMeals->totalCarbs += $totalCaloriesSnack->totalCarbs;
    $totalAllMeals->totalFat += $totalCaloriesSnack->totalFat;
    $totalAllMeals->totalProtein += $totalCaloriesSnack->totalProtein;

    return $totalAllMeals;
}

public function calculateMacronutrientTargets($email)
{
    // Get the user's total calories from the database
    $userCalories = DB::select("SELECT calories FROM user WHERE email = ?", [$email]);

    if (empty($userCalories)) {
        // Handle the case where user data is not found
        return null;
    }

    $userTotalCalories = $userCalories[0]->calories;

    // Define macronutrient distribution ratios (percentage of total calories)
    $proteinRatio = 0.15; // 15%
    $carbRatio = 0.55;    // 55%
    $fatRatio = 0.30;     // 30%

    // Calculate the target macronutrient values
    $targetProtein = $userTotalCalories * $proteinRatio / 4; // 4 calories per gram of protein
    $targetCarb = $userTotalCalories * $carbRatio / 4;       // 4 calories per gram of carbohydrate
    $targetFat = $userTotalCalories * $fatRatio / 9;         // 9 calories per gram of fat

    // Create an object to hold the target values
    $targetMacronutrients = (object) [
        'targetCalories' => $userTotalCalories,
        'targetProtein' => $targetProtein,
        'targetCarb' => $targetCarb,
        'targetFat' => $targetFat,
    ];

    return $targetMacronutrients;
}   


public function calculateRemainingNutrients($totalAllMeals, $targetMacronutrients)
{
    $remainingNutrients = (object) [
        'remainingCalories' => $targetMacronutrients->targetCalories - $totalAllMeals->totalCalories,
        'remainingProtein' => $targetMacronutrients->targetProtein - $totalAllMeals->totalProtein,
        'remainingCarb' => $targetMacronutrients->targetCarb - $totalAllMeals->totalCarbs,
        'remainingFat' => $targetMacronutrients->targetFat - $totalAllMeals->totalFat,
    ];

    return $remainingNutrients;
}



public function delete_food(Request $request)
{
  
        // Retrieve data from the request
        $food_name = $request->input('food_name');
        $meal_name = $request->input('meal_name');
        $date_id = $request->input('date_id');
        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

        $foodId = DB::select("SELECT food_id FROM food WHERE food_name = ?", [$food_name]);
        $foodId = $foodId[0]->food_id; // Assuming it returns a single result
  
        // Select User_id using Gmail
        $userId = DB::select("SELECT user_id FROM user WHERE email = ?", [$email]);
        $userId = $userId[0]->user_id; // Assuming it returns a single result

        // Select Meal_id using Meal_name
        $mealId = DB::select("SELECT meal_id FROM meal WHERE meal_name = ?", [$meal_name]);
        $mealId = $mealId[0]->meal_id; // Assuming it returns a single result

        //$dateId = DB::select("SELECT date_id FROM dates WHERE full_date = ?", [$inputDate]);
        //$dateId = $dateId[0]->date_id; // Assuming it returns a single result


        DB::statement("
            DELETE FROM junction_table
            WHERE food_id = ? AND user_id = ? AND meal_id = ? and date_id = ?
        ", [$foodId, $userId, $mealId,$date_id]);


        return Redirect::route('meal_plan');




    

}


}
