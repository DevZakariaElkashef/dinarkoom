<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::orderBy('active', 'desc')->latest()->paginate(10);
        $months = [];
        for ($month = 1; $month <= 12; $month++) {
            $date = \Carbon\Carbon::create(null, $month, 1);
            $months[$month] = $date->format('F');
        }

        return view('dashboard.images.index', compact('images', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $months = [];
        for ($month = 1; $month <= 12; $month++) {
            $date = \Carbon\Carbon::create(null, $month, 1);
            $months[$month] = $date->format('F');
        }

        return view("dashboard.images.create", compact('months'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Image::rules());

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_store_the_image!"));
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data = $request->except('thumbnail', '_token');
        $data['thumbnail'] = $request->thumbnail->store('images');
        $data['user_id'] = $request->user()->id;
        Image::create($data);

        return back()->with('message', __("added_Image_successfully"));


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
        $validator = Validator::make($request->all(), Image::rules());

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_update_the_image!"));
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data = $request->except('thumbnail', '_token');
        $image = Image::findOrFail($id);
        
        if($request->has('thumbnail')) {

            $data['thumbnail'] = $request->thumbnail->store('images');
            Storage::delete($image->thumbnail);
        }

        $data['user_id'] = $request->user()->id;
        $image->update($data);

        return back()->with('message', __("added_Image_successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::findOrFail($id);
        Storage::delete($image->thumbnail);
        $image->delete();

        return back()->with('message', __("image_deleted_successfully"));
    }

    public function active($id)
    {
        $image = Image::findOrFail($id);
        $image->active = 1;
        $image->save();
        Image::where('id', '!=', $id)->get()->each(function($image){
            $image->active = 0;
            $image->save();
        });

        return back()->with('message', __("Image_Active_successfully"));
    }
    
    public function deactive($id)
    {
        $image = Image::findOrFail($id);

        $image->active = 0;
        $image->save();

        return back()->with('message', __("Image_Deactive_successfully"));
    }
}
