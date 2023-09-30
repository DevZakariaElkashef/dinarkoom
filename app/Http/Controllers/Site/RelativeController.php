<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRelative;
use App\Models\Relative;
use App\Models\RelativeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RelativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.relatives.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = RelativeType::all();

        return view('site.relatives.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), UserStoreRelative::rules());

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_store_relative!"));
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['user_id'] = $request->user()->id;

        Relative::create($data);

        return back()->with('message', 'relatieve created successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
