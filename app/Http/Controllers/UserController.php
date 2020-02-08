<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Storage;
use Str;

class UserController extends Controller
{
    public function showPasswordRecoverForm(){
        return view('frontend.auth.recover-password');
    }

    public function passwordRecover(Request $request){
        $request->validate([
            'mobile' => 'required'
        ]);

        $user = User::where('mobile', $request->mobile)->first();

        if (is_null($user)){
            return back()->with(['mobile' => $request->mobile, 'invalid_mobile' => 'Your mobile number does not exists.']);
        }

        $password = $password = rand(11111111, 99999999);

        $user->update(['password' => Hash::make($password)]);

        $admin_user_controller = new \App\Http\Controllers\Admin\UserController();

        $admin_user_controller->sendSMS($request->mobile, $password);

        return back()->with('tSuccessMsg', 'Your new password has been send your mobile successfully');
    }

    public function downloadAdmitCard(){
        $admit = 'uploads/admit-card/'.Auth::user()->admit_card;
        return Storage::disk('local')->download($admit);
    }
}
