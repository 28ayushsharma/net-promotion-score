<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Auth,View,Hash;

use App\User;
use App\NpsCollection;

class UserController extends Controller{
    /**
    * middleware restriction only superadmin allowed
    *@param null
    *
    * @return view page
    */

    /**
     * Show the application dashboard.
     *@param null
     *
     * @return view page
     */
    public function index(){
        $promotors = NpsCollection::where('user_id', Auth::id())->where("submitted_on","<>",null)
        ->where("rating",">",8)->count();
        $detractors = NpsCollection::where('user_id', Auth::id())->where("submitted_on","<>",null)
        ->where("rating","<",7)->count();
        $passives = NpsCollection::where('user_id', Auth::id())->where("submitted_on","<>",null)
        ->where("rating",">",6)->where("rating","<",9)->count();

        $total_nps = NpsCollection::where('user_id', Auth::id())->where("submitted_on","<>",null)->count();
           $promotors_percentage = 0;
            $detractors_percentage = 0;
            $passives_percentage = 0;
        if($total_nps != 0){
            $promotors_percentage = round(($promotors/$total_nps)*100,2);
            $detractors_percentage = round(($detractors/$total_nps)*100,2);
            $passives_percentage = round(($passives/$total_nps)*100,2);
        }
        return view('admin-panel.dashboard',compact('promotors','detractors','passives','total_nps','promotors_percentage','detractors_percentage','passives_percentage') );
    }


    /**
    * signup user
    *@param null
    *
    * @return view page with success msg
    */
    public function save(Request $request){
        $input_data = $request->get('formData');
        $rules = [
            'first_name'  => 'required|max:255',
            'last_name'   => 'required|max:255',
            'phone'     => 'required|numeric',
            'email'     => 'required|email|unique:users,email,',
            'password'  => 'required|min:6|max:255',
            ];

        $validator = Validator::make($input_data, $rules);
        if ($validator->fails()){
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()->toArray()
            ]);
        }else{
            User::create([
                "first_name"      => ucwords($input_data['first_name']),
                "last_name"      => ucwords($input_data['last_name']),
                "email"     => $input_data['email'],
                "password"  => Hash::make($input_data['password']),
                "phone"  => $input_data['phone']
            ]);
            return response()->json([
                'status' => 1,
                'msg'    => "Data saved successfully"
            ]);
        
        }
    }//save() END


    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required|max:255'
            ]);

        if ($validator->fails()){
            return back()->withErrors($validator);
        }else{
            if(Auth::attempt(['email' =>$request->input('email'), 'password' =>$request->input('password')])){
                return redirect()->route('dashboard');
            }else{
                $request->session()->flash('status', 'error');
                $request->session()->flash('msg', 'Incorrect credentials');
            }
        } 
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}//User controller END
