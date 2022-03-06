<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Hash;


class HomeController extends Controller
{
    /*
    * Get all character data from api
    */
    public function getAllCurlData(Request $request){
        $input   = $request->all();
        if(isset($input['page'])){
            $page = $input['page'] ;
        }else{
            $page = 1 ;
        }
        
        $apiURL = 'https://swapi.dev/api/people/?page='.$page  ;
        $allCurlData = Curl::to($apiURL)->get();             
        $allCurlData = json_decode($allCurlData, true);
        $allData   =  $allCurlData["results"];
        $totalRecords   =  $allCurlData["count"];
        $number_of_pages = ceil($totalRecords/10);
        return view('characters',compact(['allData','number_of_pages','page']));
    }//end of the function

    /*
    * Submit Action
    */
    public function submitRegister(Request $request){
        $validator = Validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:25',
                'cpassword' => 'required_with:password|same:password',
        ]);
        if ($validator->fails()) {
           return redirect('register')->withErrors($validator)->withInput();
        }

        $arrData['fname'] = $request->fname;
        $arrData['lname'] = $request->lname;
        $arrData['email'] = $request->email;
        $arrData['password'] = Hash::make($request->password);

        $user = User::create($arrData);
        return redirect('thank-you');
    }//end of the function

    /*
    * Login Action
    */
    public function submitLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6|max:25',
        ]);
        if ($validator->fails()) {
           return redirect('login')->withErrors($validator)->withInput();
        }

        if ($user = Auth::attempt(array('email' => $request->email, 'password' => $request->password))){
              $user =  Auth::user();
              Auth::loginUsingId($user);
                 return redirect('/');
        }else{
            return redirect('login')->with(['msg' => 'Invalide Credential','status'=>'error']);
        }
    }//end of the function 

}
