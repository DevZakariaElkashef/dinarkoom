<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Models\RelativeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RelativeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = RelativeType::latest()->paginate(10);
        return view('dashboard.relatives.type', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), StoreTypeRequest::rules());

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_store_type!"));
            return Redirect::back()->withErrors($validator)->withInput();

        }

        $data = $request->all();

        RelativeType::create($data);

        return back()->with('message', __("Type Created Successfully"));
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
        $validator = Validator::make($request->all(), StoreTypeRequest::rules());

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_store_type!"));
            return Redirect::back()->withErrors($validator)->withInput();

        }

        $data = $request->except('_token');

        $type = RelativeType::findOrFail($id);
        $type->update($data);

        return back()->with('message', 'type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = RelativeType::findOrFail($id);

        $type->delete();

        return back()->with('message', 'type deleted successfully');
    }
}
