<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
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

        $students = $students->latest()->paginate($perPage);

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

        return redirect(route('admin.users.index'))->with('successMsg', 'User has been added successfully.');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        $directory = 'uploads/admit-card';

        if (Storage::disk('public')->exists($directory.'/'.$user->admit_card)){
            Storage::disk('public')->delete($directory.'/'.$user->admit_card);
        }

        $user->delete();
        return back()->with('successMsg', 'User has been deleted successfully');
    }
}
