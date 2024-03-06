<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountCreatingController extends Controller
{
    public function creating1(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $error_msg = "Already Existed Email, Please Create Other One";
        $existingUser = DB::select('SELECT * FROM user WHERE email = ? LIMIT 1', [$email]);
        if (empty($existingUser)) {
            try {
                    // Using the DB facade to execute a raw SQL insert statement
                    DB::insert('INSERT INTO user (email, password) VALUES (?, ?)', [$email, $password]);
        
                    session_start();
                    $_SESSION['email'] = $email;
                    // Optionally, you can return a response or redirect to another page
                    return view('login/sign_up2');
            } catch (\Exception $e) {
                    // Handle any exceptions, such as database errors
                    return response()->json(['error' => 'Failed to create user'], 500);
            }
        }else{
            return view('login/sign_up', compact('error_msg'));
        }
    }
public function creating2(Request $request) {
    $weight = $request->input('weight');
    $height = $request->input('height');
    $user_name = $request->input('user_name');
    $age = $request->input('age');
    $gender = $request->input('gender');
    $activity = $request->input('activityLevel');
    $status = "Active";
    $admin_id = 1;
    session_start();
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
    // Calculate BMR based on gender
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
public function edit_profile(Request $request){
    
}
}