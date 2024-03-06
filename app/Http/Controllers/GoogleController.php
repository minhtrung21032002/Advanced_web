<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {   
            $user = Socialite::driver('google')->user();
            session_start();
            // Retrieve user information
            $gmailEmail = $user->getEmail();
            $_SESSION['email'] = $gmailEmail;
            $existingUser = DB::select('SELECT * FROM user WHERE email = ? LIMIT 1', [$gmailEmail]);
            if (!empty($existingUser)) {
                $userData = $existingUser[0];
                return view('summary/summary',compact('userData'));
            } else {
                try{
                    DB::insert("INSERT INTO user (email) VALUES (?)", [$gmailEmail]);
                    return view('login/creating_password');

                    }catch (\Exception $e) {
                        // If there's an error, output the error message
                        dd($e->getMessage());
                    } 
            }
      
    }
    public function creating_password(Request $request){
        $weight = $request->input('weight');
        $height = $request->input('height');
        $user_name = $request->input('user_name');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $password = $request->input('password');
        $activity = $request->input('activityLevel');
        $status = "Active";
        $admin_id = 1;
        $bmr = ($gender == 'male') ? (10 * $weight) + (6.25 * $height) - (5 * $age) + 5 : (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;

        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;



        $activityMultiplier = 1.2; // Sedentary (default)
            if ($activity == 'Lightly Active') {
                $activityMultiplier = 1.375;
            } elseif ($activity == 'Active') {
                $activityMultiplier = 1.55;
            } elseif ($activity == 'Very Active') {
                $activityMultiplier = 1.725;
            }

    $tdee = $bmr * $activityMultiplier;

    // Save calculated calories in the database
    try {
        DB::update('UPDATE user SET weight = ?, height = ?, user_name = ?, age = ?, gender = ?, activity_level = ?, calories = ?, status = ?, admin_id = ? WHERE email = ?', [$weight, $height, $user_name, $age, $gender, $activity, $tdee,$status,$admin_id, $email]);

        // Retrieve user data
        $results = DB::select("SELECT user_name, calories FROM user WHERE email = ?", [$email]);
        // Optionally, you can return a response or redirect to another page
        if (!empty($results)) {
            $userData = $results[0];
            return view('summary/summary', compact('userData'));
        }
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        // Handle any exceptions, such as database errors
        return response()->json(['error' => 'Failed to create user'], 500);
    }

    }
}
