<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CsvData;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use DB;

class HomeController extends Controller
{
    
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('frontend.user_login');
    }

    public function registration(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        if($request->has('referral_code')){
            Cookie::queue('referral_code', $request->referral_code, 43200);
        }
        return view('frontend.user_registration');
    }
    
    public function csvupload()
    {
        return view('frontend.csv_form');
    }

    public function index(Request $request)
    {
        $data = CsvData::query();
        
        // Apply filters
        if ($request->has('name')) {
            $data->where('name', 'like', '%' . $request->input('name') . '%');
        }
        
    
        if ($request->has('domain')) {
            $data->where('domain', 'like', '%' . $request->input('domain') . '%');
        }

    
        if ($request->has('year_founded')) {
            $data->where('year_founded','like', '%'. $request->input('year_founded'));
        }
        
    
        if ($request->has('industry')) {
            $data->where('industry', 'like', '%' . $request->input('industry') . '%');
        }
        
    
        if ($request->has('size_range')) {
            $data->where('size_range', 'like', '%'. $request->input('size_range'));
        }
        
    
        if ($request->has('locality')) {
            $data->where('locality', 'like', '%' . $request->input('locality') . '%');
        }
    
        if ($request->has('country')) {
            $data->where('country', 'like', '%' . $request->input('country') . '%');
        }
    
        if ($request->has('linkedin_url')) {
            $data->where('linkedin_url', 'like', '%' . $request->input('linkedin_url') . '%');
        }
    
        if ($request->has('current_employee_estimate')) {
            $data->where('current_employee_estimate', 'like', '%' .$request->input('current_employee_estimate'));
        }

    
        // Add more filters for other columns

        $data = $data->get();
        
        return view('welcome', compact('data'));
    }
    public function users()
    {
        $users = User::all();
        return view('frontend.users', compact('users'));
    }
    
    
}
