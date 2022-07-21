<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::limit('5')->orderby('id', 'desc')->get();
        $usercount = User::count();
        return view('admin.include.homepage', ['users' => $users, 'usercount' => $usercount]);
    }
}
