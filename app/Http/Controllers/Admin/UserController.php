<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Route;
use Storage;
use Str;

class UserController extends Controller
{
    public function index()
    {
        $perPage = request()->perPage ?: 10;
        $keyword = request()->keyword;

        $students = new  User();

        if ($keyword){

            $keyword = '%'.request()->keyword.'%';

            $students = $students->where('name', 'like', $keyword)
                ->orWhere('mobile', 'like', $keyword)
                ->orWhere('admit_card', 'like', $keyword);
        }

        $students = $students->where('role_id', '!=', 1)->latest()->paginate($perPage);

        return view('admin.user.index', compact('students'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'sometimes|max:255',
            'mobile' => 'required|numeric|unique:users',
            'admit_card' => 'required|mimes:pdf'
        ]);

        $admit_card = $request->file('admit_card');

        $admit_name = strtolower($request->mobile.'_'.$admit_card->getClientOriginalName());

        $directory = 'uploads/admit-card';

        // check is exits directory
        if (!Storage::disk('local')->exists($directory)){
            Storage::disk('local')->makeDirectory($directory);
        }

        Storage::disk('local')->putFileAs($directory, $admit_card, $admit_name);

        $password = rand(11111111, 99999999);

        $send_msg_response = $this->sendSMS($request->mobile, $password);

        User::create([
            'name' => $request['name'],
            'mobile' => $request['mobile'],
            'admit_card' => $admit_name,
            'password' => Hash::make($password),
            'send_message' => $send_msg_response['status'] === 'Successful' ? true : false
        ]);

        return redirect(route('admin.users.index'))->with('tSuccessMsg', 'User has been added successfully.');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'sometimes|max:255',
            'mobile' => 'required|numeric|unique:users,mobile,'.$user->id,
            'admit_card' => 'sometimes|nullable|mimes:pdf'
        ]);

        $data = [
            'name' => $request['name'],
            'mobile' => $request['mobile']
        ];

        if ($request->hasFile('admit_card')) {

            $admit_card = $request->file('admit_card');

            $admit_name = strtolower($request->mobile.'_'.$admit_card->getClientOriginalName());

            $directory = 'uploads/admit-card';

            //delete old admit card
            if (Storage::disk('local')->exists($directory.'/'.$user->admit_card)){
                Storage::disk('local')->delete($directory.'/'.$user->admit_card);
            }

            // check is exits directory
            if (!Storage::disk('local')->exists($directory)){
                Storage::disk('local')->makeDirectory($directory);
            }

            Storage::disk('local')->putFileAs($directory, $admit_card, $admit_name);

            $data['admit_card'] = $admit_name;
        }

        $user->update($data);

        return redirect(route('admin.users.index'))->with('tSuccessMsg', 'User has been updated successfully.');
    }

    public function destroy(User $user)
    {
        $directory = 'uploads/admit-card';

        if (Storage::disk('local')->exists($directory.'/'.$user->admit_card)){
            Storage::disk('local')->delete($directory.'/'.$user->admit_card);
        }

        $user->delete();
        return back()->with('tSuccessMsg', 'User has been deleted successfully');
    }

    public function changePassword(){

        $route_name = Route::currentRouteName();

        if ($route_name === 'password.change'){
            return view('frontend.auth.change-password');
        }else{
            return view('auth.passwords.change-password');
        }
    }

    public function updatePassword(Request $request){

        $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $find_user = User::find(Auth::user()->id);

        if(!Hash::check($request->currentPassword, $find_user->password)){
            return back()->with('invalid_current_pass', 'Invalid current password');
        }

        $find_user->update(['password' => Hash::make($request->password)]);

        return back()->with('tSuccessMsg', 'Password has been changed successfully');
    }

    public function sendSMS($number, $user_password){

        $website = config('app.url');

        $user_name = 'noman';
        $password = '111111';
        $sms_content = "$user_password is your password. You can login now using your mobile and this password. Website : $website";

        $url = "http://gosms.xyz/api/v1/sendSms?username=$user_name&password=$password&number=$number&sms_content=$sms_content&sms_type=1&masking=non-masking";

        $url = preg_replace("/ /", "%20", $url);

        $response = file_get_contents($url);

        $response = json_decode($response, true);

        return $response;
    }

    public function downloadAdmitCard(){
        $admit = 'uploads/admit-card/'.request('admit_card');
        return Storage::disk('local')->download($admit);
    }
}
