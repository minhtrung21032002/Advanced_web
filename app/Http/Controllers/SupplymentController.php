<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SupplymentController extends Controller
{
    public function display_supplement(Request $request){
        $supplements = DB::table('supplements')
            ->select('supplement_id', 'supplement_name', 'category', 'thumbnail_img')
            ->get();
        return view('supplement/sup_list',compact('supplements'));

    }
    public function display_supplement_detail(Request $request, $id){
        $supplement = DB::table('supplements')->where('supplement_id', $id)->first();

        
        // Query the components table
        $components = DB::table('components')->where('supplement_id', $id)->get();
        
        // Query the usage table
        $usage = DB::table('usage')->where('supplement_id', $id)->get();
    
        return view('supplement/sup_detail', compact('supplement', 'components', 'usage'));

    }


}
