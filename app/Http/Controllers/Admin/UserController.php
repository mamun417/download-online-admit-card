<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
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
        if (!Storage::disk('public')->exists($directory)){
            Storage::disk('public')->makeDirectory($directory);
        }

        Storage::disk('public')->putFileAs($directory, $admit_card, $admit_name);


        $password = Str::random(8);

        User::create([
            'name' => $request['name'],
            'mobile' => $request['mobile'],
            'admit_card' => $admit_name,
            'password' => Hash::make($password)
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
            if (Storage::disk('public')->exists($directory.'/'.$user->admit_card)){
                Storage::disk('public')->delete($directory.'/'.$user->admit_card);
            }

            // check is exits directory
            if (!Storage::disk('public')->exists($directory)){
                Storage::disk('public')->makeDirectory($directory);
            }

            Storage::disk('public')->putFileAs($directory, $admit_card, $admit_name);

            $data['admit_card'] = $admit_name;
        }

        $user->update($data);

        return redirect(route('admin.users.index'))->with('tSuccessMsg', 'User has been updated successfully.');
    }

    public function destroy(User $user)
    {
        $directory = 'uploads/admit-card';

        if (Storage::disk('public')->exists($directory.'/'.$user->admit_card)){
            Storage::disk('public')->delete($directory.'/'.$user->admit_card);
        }

        $user->delete();
        return back()->with('tSuccessMsg', 'User has been deleted successfully');
    }

    public function changePassword(){
        return view('auth.passwords.change-password');
    }

    public function updatePassword(Request $request){

        $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);;

        $find_user = User::find(Auth::user()->id);

        if(!Hash::check($request->currentPassword, $find_user->password)){
            return back()->with('invalid_current_pass', 'Invalid current password');
        }

        $find_user->update(['password' =>  Hash::make($request->password)]);

        return back()->with('tSuccessMsg', 'Password has been changed successfully');
    }
}
