<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Contracts\Validation\Validator;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Contracts\Validation\Validator;
// use Validator;
// use \Validator;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{
    function index()
    {
        return view('dashboards.admins.index');
    }

    function profile()
    {
        return view('dashboards.admins.profile');
    }
    function settings()
    {
        return view('dashboards.admins.settings');
    }

    function updateInfo(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'favoriteColor'=>'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'favoriteColor'=>$request->favoriteColor,
            ]);

            // if(!$query){
            //     return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            // }else{
            //     return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
            // }
            return redirect()->back()->with('success', 'You are now successfully edit profile');
        }
    }
}
