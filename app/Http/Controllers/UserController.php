<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderby('id', 'desc')->get();
        return view('admin.include.users.index', ['users' => $users]);
    }



    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ],
            [
                'name.required' => 'İsim alanı boş bırakılamaz',
                'email.required' => 'Email alanı boş bırakılamaz',
                'email.email' => 'Email formatı hatalı',
                'email.unique' => 'Email daha önce kullanılmış',
                'password.required' => 'Şifre alanı boş bırakılamaz',
            ]
        );
        $imageFile = $request->file('image');
        $image = uniqid() . "." . $imageFile->getClientOriginalExtension();
        $imageFile->move(public_path("testing/"), $image);

    }

    public function session_put(Request $request)
    {
    }
    public function session_get(Request $request)
    {
        echo  $request->session()->get('deneme');
    }
}
