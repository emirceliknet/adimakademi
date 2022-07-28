<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
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

    public function data_show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();


        foreach ($role->permissions as $out) {
            foreach ($permissions as $in) {
                if ($in->id === $out->id) {
                    $in->checked = "checked";
                }
            }
        }
        return response()->json(['status' => true, 'message' => '', 'data' => $permissions]);
    }

    public function update_permission(Request $request)
    {
        $role = Role::find($request->id);
        $role->syncPermissions($request->val);
        return response()->json(['status' => true, 'message' => '']);
    }
}
