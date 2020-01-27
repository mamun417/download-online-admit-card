<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        //
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
        //
    }
}
