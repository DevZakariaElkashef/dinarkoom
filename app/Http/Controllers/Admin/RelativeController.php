<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RelativeExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRelativeRequest;
use App\Http\Requests\UpdateRelativeRequest;
use App\Models\Relative;
use App\Models\RelativeType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class RelativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relatives = Relative::latest()->paginate(10);

        return view('dashboard.relatives.index', compact('relatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = RelativeType::all();
        $users = User::all();

        return view("dashboard.relatives.create", compact('types', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), StoreRelativeRequest::rules());

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_store_relative!"));
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $data = $request->except('_token');

        Relative::create($data);

        return back()->with('message', __("Relative Created Successfully"));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), UpdateRelativeRequest::rules($id));

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_store_relative!"));
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');

        $relative = Relative::findOrFail($id);
        $relative->update($data);
        
        return back()->with('message', __("Relative Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $relative = Relative::findOrFail($id);
        $relative->delete();
        return back()->with('message', __("Relative Deleted Successfully"));
    }

    public function exportExcel()
    {
        return Excel::download(new RelativeExport, 'relatives.xlsx');
    }

    public function exportPdf()
    {
        $relatives = Relative::all();
        $pdf = PDF::loadView('dashboard.relatives.pdf', compact('relatives'));
        $pdf->download('relatives.pdf');
    }

    public function search(Request $request)
    {
        $value = $request->value;

        $relatives = User::where('name', 'like', "%$value%")
                    ->orWhere('civil_id', 'like', "%$value%")
                    ->latest()
                    ->paginate(10);

        return view('dashboard.relatives.table', compact('relatives'))->render();

    }
}
