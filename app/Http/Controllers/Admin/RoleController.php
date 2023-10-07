<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->paginate(10);
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->validated();

        $role = Role::where('name', $data['name'])->first();

        if ($role == null) {
            $role = Role::create(['name' => $data['name']]);
        }

        if ($request->has('options')) {
            foreach ($data['options'] as $permission) {
                $perm = Permission::find($permission);
                $perm->assignRole($role);
            }
        }

        return back()->with('message', __("Role Created Successfully"));


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);
        $role->save();

        return back()->with('message', __("Role Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::findOrFail($id)->delete();

        return back()->with('message', __("Role Deleted Successfully"));
    }
}
