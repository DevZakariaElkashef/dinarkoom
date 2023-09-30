<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSiteSettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setts = Setting::first();
        return view('dashboard.settings.index', compact('setts'));
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
        //
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
    public function update(UpdateSiteSettingsRequest $request, string $id)
    {
        $data = $request->except('logo', '_token');
        
        if($request->has('logo')) {
            $data['logo'] = $request->logo->store('logo');
        }



        if($id == 0) 
        {
            Setting::create($data);

            return back()->with('message', 'created_succces');
            
        } else {
            $setts = Setting::findOrFail($id);
            
            if ($request->has('logo') && $setts->logo) {
                Storage::delete($setts->logo);
            }

            $setts->update($data);
            
            return back()->with('message', 'updated_succces');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
