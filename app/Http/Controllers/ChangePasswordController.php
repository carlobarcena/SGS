<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use DB;

class ChangePasswordController extends Controller
{
	function changePassword(Request $request){
		$current_user = Auth::user();
        $user = $current_user->username;
        $oldpass = $request->oldpassword;
        $newpass = $request->newpassword;
        $oldpassword = $current_user->password;
     
       	$rules = array(
        	'oldpassword' =>'required|min: 4',
        	'newpassword' =>'required|min: 4'
        );
    	$this->validate($request,$rules);
        
    	if (Hash::check($oldpass, $oldpassword)) {
    	// The old password matches the hash in the database
        DB::table('users')
            ->where('username', $user)
            ->update(['password' => Hash::make($newpass)]);
            session(['sucpascha' => 1]);
            return redirect('home');
		}
		else{
			session(['faipascha' => 1]);
			return view('changepassword');
		}
	}
    function show(){
    	return view('changepassword');
    }
}
