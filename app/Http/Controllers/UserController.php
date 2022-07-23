<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $items = User::orderby('id', 'desc')->get();
        return view('admin.include.users.index', ['items' => $items]);
    }



    public function create(Request $request)
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

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $imageFile = $request->file('image');
        if ($imageFile) {
            $image = uniqid() . "." . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path("img/avatarupload"), $image);
        } else {
            $image = "default.png";
        }
        $user->avatar = $image;


        $user->save();
    }

    public function edit(Request $request)
    {

        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'id' => 'required',
            ],
            [
                'name.required' => 'İsim alanı boş bırakılamaz',
                'email.required' => 'Email alanı boş bırakılamaz',
                'email.email' => 'Email formatı hatalı',
                'id.required' => 'Kritik sorun, veribulunamadı!',

            ]
        );
        $id = $request->id;
        $user = User::find($id);
        $imageFile = $request->file('image');
        if ($imageFile) {
            $image_delete_path = public_path("img/avatarupload/" . $user->avatar);
            File::delete($image_delete_path);
            $image = uniqid() . "." . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path("img/avatarupload"), $image);
        } else {
            $image = $user->avatar;
        }

        if ($request->password == null) {
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $image
            ]);
        } else {
            $pass = Hash::make($request->password);
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $pass,
                'avatar' => $image
            ]);
        }
    }

    public function data($id)
    {
        $data = User::find($id);
        return response()->json(['status' => true, 'message' => '', 'data' => $data]);
    }

    public function delete($id)
    {
        $data = User::find($id);
        $image_delete_path = public_path("img/avatarupload/" . $data->avatar);
        File::delete($image_delete_path);
        User::find($id)->delete();
        return response()->json(['status' => true, 'message' => '']);
    }
}
