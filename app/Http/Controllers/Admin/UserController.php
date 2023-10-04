<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('id', '!=', $request->user()->id)->latest()->paginate(10);
        $roles = Role::all();
        return view("dashboard.users.index", compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), User::rules());

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_store_the_user!"));
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);

        $role = Role::find($data['role_id']);

        $user = User::create($data);
        $user->assignRole($role);

        return back()->with('message', __("User_Added_Successfully."));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), User::rules($id));

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_update_the_user!"));
            return Redirect::back()->withErrors($validator)->withInput();

        }
        
        $data = $request->except('password');
        if ($request->has('password') && $request->password != '') {
            $data['password'] = Hash::make($request->password);
        }

        User::findOrFail($id)->update($data);

        return back()->with('message', __("User_Update_Successfully."));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();
        
        return back()->with('message', __("User_Deleted_Successfully."));
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportPdf()
    {
    // $pdf = PDF::loadView('pdf.document', $data);
    // $pdf->getMpdf()->AddPage(/*...*/);
    }
}
