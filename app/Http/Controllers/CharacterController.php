<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Hash;
use App\Models\SavedCharacter;


class CharacterController extends Controller
{
    /*
    * Character details
    */
    public function characterDetail(Request $request , $id){
        $CurlData = Curl::to('https://swapi.dev/api/people/'.$id)->get();
        $CurlData = json_decode($CurlData, true);
        $isExits = SavedCharacter::where(['user_id'=>Auth::user()->id , 'character_id'=>$id])->get();
        return view('character_detail',compact(['CurlData','isExits']));
    }

    /*
    * Save Character
    */
    public function saveCharacter(Request $request,$userid,$characterid){
        $SavedCharacter = SavedCharacter::where(['user_id'=>auth::user()->id , 'character_id'=>$characterid])->first();
        if(empty($SavedCharacter)){
          $SavedCharacter = new SavedCharacter();
        }
        $SavedCharacter->user_id = $userid;
        $SavedCharacter->character_id = $characterid;
        $SavedCharacter->save();
        return redirect('/characters')->with(['status'=>'success','msg'=>'This Character Saved Successfully']);
    }

    /*
    * Delete Character
    */
    public function deleteCharacter(Request $request,$userid,$characterid){
        $SavedCharacter = SavedCharacter::where(['user_id'=>auth::user()->id , 'character_id'=>$characterid])->delete();  
        return redirect('/characters')->with(['status'=>'success','msg'=>'This Character Deteled Successfully']);
    }

    /*
    * List of saved character
    */
    public function savedCharecterList(){
        $SavedCharacterList = SavedCharacter::where('user_id',auth::user()->id)->get();
        $sub_curl_data = array();
        if($SavedCharacterList){
          foreach($SavedCharacterList as $item){ 
              $CurlData = Curl::to('https://swapi.dev/api/people/'.$item['character_id'])->get();
              $CurlData = json_decode($CurlData, true);
              $sub_curl_data[] = $CurlData;
          }
        }else{
            $sub_curl_data = array();
        }
        return view('saved_character',compact('sub_curl_data'));
    }

}
