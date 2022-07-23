<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        $items = Role::orderby('id', 'desc')->get();
        return view('admin.include.roles.index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'İsim alanı boş bırakılamaz',
            ]
        );
        Role::create(['name' => $request->name, 'info' => $request->info]);
    }
    public function edit(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'id' => 'required',
            ],
            [
                'name.required' => 'İsim alanı boş bırakılamaz',
                'id.required' => 'Kritik hata, yönetici ile iletişime geçin',
            ]
        );
        $id = $request->id;
        Role::where('id', $id)->update([
            'name' => $request->name,
            'info' => $request->info,
        ]);
    }
    public function delete($id)
    {
        Role::find($id)->delete();
        return response()->json(['status' => true, 'message' => '']);
    }
    public function data($id)
    {
        $data = Role::find($id);
        return response()->json(['status' => true, 'message' => '', 'data' => $data]);
    }
}
