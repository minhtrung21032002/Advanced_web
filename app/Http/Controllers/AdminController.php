<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function deactive_user(Request $request){ 
        $user_email = $request->input('user_email');
        $status = "Deactive";
        DB::update("UPDATE user SET status = ? WHERE email = ?", [$status, $user_email]);
        $users = DB::select("
            SELECT user.*, photo.photo_url
            FROM user
            LEFT JOIN photo ON user.photo_id = photo.photo_id
            ");
        return view('admin/admin',compact('users'));
    }

    public function active_user(Request $request){ 
        $user_email = $request->input('user_email');
        $status = "Active";
        DB::update("UPDATE user SET status = ? WHERE email = ?", [$status, $user_email]);
        $users = DB::select("
            SELECT user.*, photo.photo_url
            FROM user
            LEFT JOIN photo ON user.photo_id = photo.photo_id
            ");
        return view('admin/admin',compact('users'));
    }
    public function user_management(Request $request){
        $users = DB::select("
            SELECT user.*, photo.photo_url
            FROM user
            LEFT JOIN photo ON user.photo_id = photo.photo_id
        ");
        return view('admin/admin',compact('users'));
    }
    public function supplement_management(Request $request){
        $supplements = DB::select("
            SELECT * from supplements
        ");
        return view('admin/supplement',compact('supplements'));
    }
    public function adding_supplement(Request $request){
        $productOverview = $request->input('productOverview');
        $product_name = $request->input('product_name');
        $category = $request->input('category');
        $buyingLink = $request->input('bying_link');
        $whatIsIt = $request->input('whatIsIt');
        $howToUse = $request->input('how_to_use');
        $usageList = $request->input('usageList');
        $components = $request->input('componentTable.component');
        $purposes = $request->input('componentTable.purpose');

        $thumbnail_image = $request->file('thumbnail_image');
        $detail_image = $request->file('detail_image');
        $path1 = $thumbnail_image->store('public/assets/imgs/supplement_imgs');
        $path2 = $detail_image ->store('public/assets/imgs/supplement_imgs');
        $imageUrl = Storage::url($path1);
        $imageUrl2 = Storage::url($path2);

    

        $supplementId = DB::table('supplements')->insertGetId([
            'category' => $category,
            'supplement_name' => $product_name,
            'product_overview' => $productOverview,
            'how_to_use' => $howToUse,
            'thumbnail_img' => $imageUrl,
            'detail_img' => $imageUrl2,
            'bying_link' => $buyingLink,
            // Add other columns and values as needed
        ]);

        foreach ($components as $index => $componentName) {
            // Get the corresponding purpose
            $purpose = $purposes[$index];
        
            // Insert into components table with the retrieved supplement_id
            DB::table('components')->insert([
                'supplement_id' => $supplementId,
                'component_name' => $componentName,
                'purpose' => $purpose,
                // ... other columns and values
            ]);
        }
        foreach ($usageList as $usageText) {
            // Insert into usage table with the retrieved supplement_id
            DB::table('usage')->insert([
                'supplement_id' => $supplementId,
                'usage_text' => $usageText,
                // ... other columns and values
            ]);
        }
        
        return Redirect::route('supplement_management');
    }
    public function add_supplement(Request $request){
        return view('admin/add_supplement');
    }
    public function delete_supplement(Request $request){
        $supplement_id= $request->input('supplement_id');
        DB::table('supplements')->where('supplement_id', $supplement_id)->delete();
        DB::table('components')->where('supplement_id', $supplement_id)->delete();
        // Delete from usage table where supplement_id matches
        DB::table('usage')->where('supplement_id', $supplement_id)->delete();
        return Redirect::route('supplement_management');
    }
}
