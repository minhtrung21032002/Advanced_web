<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function display_profile()
    {
        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $results = DB::select("
            SELECT user_name, age, weight, height, gender, activity_level,photo_id
            FROM user
            WHERE email = ?
        ", [$email]);
        if (!empty($results)) {
            $userData = $results[0]; 
            $photoUrls = DB::select("SELECT photo_url FROM photo WHERE photo_id = ?", [$userData->photo_id]);
            $imageUrl = $photoUrls[0]->photo_url; // Assuming it returns a single result

            return view('summary/profile', compact('userData','imageUrl'));
        } else {
            // Handle the case where no user with the specified email is found
            return view('summary/summary')->with('error', 'User not found for the provided email.');
        }
    }

    public function edit_profile(Request $request){
        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $userName = $request->input('user_name');
        $gender = $request->input('gender');
        $weight = $request->input('weight');
        $height = $request->input('height');
        $age = $request->input('age');
        $activity = $request->input('activityLevel');
        $bmr = ($gender == 'male') ? (10 * $weight) + (6.25 * $height) - (5 * $age) + 5 : (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;

        // Calculate TDEE based on activity level
        $activityMultiplier = 1.2; // Sedentary (default)
        if ($activity == 'Lightly Active') {
            $activityMultiplier = 1.375;
        } elseif ($activity == 'Active') {
            $activityMultiplier = 1.55;
        } elseif ($activity == 'Very Active') {
            $activityMultiplier = 1.725;
        }
    
        $tdee = $bmr * $activityMultiplier;

        DB::update("
        UPDATE user
        SET user_name = ?, gender = ?, weight = ?, height = ?, age = ?, activity_level = ?,calories = ?
        WHERE email = ?
    ", [$userName, $gender, $weight, $height, $age,$activity,$tdee, $email]);

        return Redirect::route('display_profile');
    }

    public function show_information(){
        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $results = DB::select("SELECT * FROM user WHERE email = ?", [$email]);

        $userId = DB::select("SELECT user_id FROM user WHERE email = ?", [$email]);
        $userId = $userId[0]->user_id; // Assuming it returns a single result

        $photoIds = DB::select("SELECT photo_id FROM user WHERE user_id = ?", [$userId]);
        $photoId = $photoIds[0]->photo_id; // Assuming it returns a single result
        
        $photoUrls = DB::select("SELECT photo_url FROM photo WHERE photo_id = ?", [$photoId]);
        $imageUrl = $photoUrls[0]->photo_url; // Assuming it returns a single result
        // If the query executes successfully, output the results
        
        if (!empty($results)) {
            $userData = $results[0]; 

            return view('summary/summary',compact('userData','imageUrl'));
        } else {
            return view('login/login');
        }
    }


    public function chart_calories_default(){
    
        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $userId = DB::select("SELECT user_id FROM user WHERE email = ?", [$email]);
        $userId = $userId[0]->user_id; // Assuming it returns a single result
        
        $results = DB::select("
            SELECT
                j.food_id,
                j.meal_id,
                j.quantity,
                j.date_id,
                f.food_name,
                f.calories,
                d.full_date
            FROM
                junction_table j
            JOIN
                dates d ON j.date_id = d.date_id
            JOIN
                food f ON j.food_id = f.food_id
            WHERE
                j.user_id = :user_id
        ", ['user_id' => $userId]);
        
        $dailyInfo = [];
        
        foreach ($results as $result) {
            $date = $result->full_date;
            $foodInfo = $result->quantity * $result->calories;
        
            // If the date is not yet in the $dailyInfo array, initialize it
            if (!isset($dailyInfo[$date])) {
                $dailyInfo[$date] = 0;
            }
        
            $dailyInfo[$date] += $foodInfo;
        }
        
        $chartData = [];
        
        foreach ($dailyInfo as $date => $foodInfo) {
            $chartData[] = (object)['date' => $date, 'chart_info' => $foodInfo,'chart_name' => 'calories'];
        }
        
        usort($chartData, function($a, $b) {
            return strtotime($a->date) - strtotime($b->date);
        });
     
        return view('summary/report', compact('chartData'));
        




    }

    public function chart_calories(Request $request){
        $chart_information = $request->input('options');
        if (empty($chart_information)){
            $chart_information = "calories";
        }
        
        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $userId = DB::select("SELECT user_id FROM user WHERE email = ?", [$email]);
        $userId = $userId[0]->user_id; // Assuming it returns a single result
        
        $results = DB::select("
            SELECT
                j.food_id,
                j.meal_id,
                j.quantity,
                j.date_id,
                f.food_name,
                f.${chart_information},
                d.full_date
            FROM
                junction_table j
            JOIN
                dates d ON j.date_id = d.date_id
            JOIN
                food f ON j.food_id = f.food_id
            WHERE
                j.user_id = :user_id
        ", ['user_id' => $userId]);
        
        $dailyInfo = [];
        
        foreach ($results as $result) {
            $date = $result->full_date;
            $foodInfo = $result->quantity * $result->{$chart_information};
        
            // If the date is not yet in the $dailyInfo array, initialize it
            if (!isset($dailyInfo[$date])) {
                $dailyInfo[$date] = 0;
            }
        
            $dailyInfo[$date] += $foodInfo;
        }
        
        $chartData = [];
        
        foreach ($dailyInfo as $date => $foodInfo) {
            $chartData[] = (object)['date' => $date, 'chart_info' => $foodInfo, 'chart_name' => $chart_information];
        }
        
        usort($chartData, function($a, $b) {
            return strtotime($a->date) - strtotime($b->date);
        });
        return view('summary/report', compact('chartData'));
        




    }

    public function upload_img(Request $request){ 

        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $userId = DB::select("SELECT user_id FROM user WHERE email = ?", [$email]);
        $userId = $userId[0]->user_id; // Assuming it returns a single result
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('image');
        $path = $image->store('public/assets/imgs/upload_imgs');
        $imageUrl = Storage::url($path);


        DB::insert("INSERT INTO photo (photo_url) VALUES (?)", [$imageUrl]);


        $photoId = DB::select("SELECT photo_id FROM photo WHERE photo_url = ?", [$imageUrl]);
        $photoId = $photoId[0]->photo_id; // Assuming it returns a single result

        DB::update("UPDATE user SET photo_id = ? WHERE user_id = ?", [$photoId, $userId]);

        // raw sql insert into photo table where url = $imageUrl
        // update field photo_id in junction with where user_id = $userId

        return Redirect::route('show_information');
    }

}

