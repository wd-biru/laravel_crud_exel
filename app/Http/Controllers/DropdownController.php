<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DropdownController extends Controller
{
    //

        public function index()
        {
            $countries = DB::table("countries")->pluck("name","id");
            return view('index',compact('countries'));
        }

        public function getStateList(Request $request)
        {
            $states = DB::table("states")
            ->where("country_id",$request->country_id)
            ->pluck("name","id");
            //dd($states);
            return response()->json($states);
        }

        public function getCityList(Request $request)
        {
            $cities = DB::table("cities")
            ->where("state_id",$request->state_id)
            ->pluck("name","id");
            return response()->json($cities);
        }
       
       public function dropdown_value(Request $request)
       {
       	     echo "DropDown Value Form Data";
       	     echo $request->data;
             return $request->all();
       }

}
