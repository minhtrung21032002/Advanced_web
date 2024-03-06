<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function process(Request $request){
        session_start();
        $email = $request->input('email');
        $password = $request->input('password');
        $_SESSION['email'] = $email;
        $error_msg = "Your Email Or Password Is Wrong";
        $error_msg2 = "Your account is locked, please contact Admin";
        try {
            // Your raw SQL query goes here
            $results = DB::select("
                SELECT user.*, photo.photo_url
                FROM user
                LEFT JOIN photo ON user.photo_id = photo.photo_id
                WHERE email = ? AND password = ?
            ", [$email, $password]);

            // If the query executes successfully, output the results
            if (!empty($results)) {
                $userData = $results[0];
                $imageUrl = $userData->photo_url;
                if($userData->status == "Deactive"){
                    return view('login/login', compact('error_msg2'));
                }
                return view('summary/summary',compact('userData','imageUrl'));
            } else {

                return view('login/login', compact('error_msg'));
            }
        } catch (\Exception $e) {
            // If there's an error, output the error message
            dd($e->getMessage());
        }
        
    }
    public function process_admin(Request $request){
        $user_name = $request->input('user_name');
        $password = $request->input('password');
        $error_msg = "Admin User Name Or Password Is Wrong";
        
        try {
            // Your raw SQL query goes here
            $results = DB::select("SELECT * FROM admin WHERE name = ? AND password = ?", [$user_name, $password]);
            // If the query executes successfully, output the results
            $users = DB::select("
            SELECT user.*, photo.photo_url
            FROM user
            LEFT JOIN photo ON user.photo_id = photo.photo_id
        ");

            if (!empty($results)) {
                $userData = $results[0]; 

                return view('admin/admin',compact('users'));
            } else {

                return view('login/login_admin', compact('error_msg'));
            }
        } catch (\Exception $e) {
            // If there's an error, output the error message
            dd($e->getMessage());
        }
        
    }
}
