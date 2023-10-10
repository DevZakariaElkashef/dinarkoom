<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rightImage = Banner::where('dir', 0)->first();
        $leftImage = Banner::where('dir', 1)->first();


        return view('dashboard.banners.index', compact('rightImage', 'leftImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), Banner::rules());

        if ($validator->fails() || !$request->has('right_image') && !$request->has('left_image')) {
            session()->flash('message', __("Faild_to_store_the_banner!"));
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_method', '_token');

        unset($data['left_image']);
        unset($data['right_image']);

        if ($request->has('left_image')) {
            $leftImage = $this->uploadeImage($request->left_image);
        } else {
            $rightImage = $this->uploadeImage($request->right_image);
        }

        $data['image'] = $leftImage ?? $rightImage;

        
        if ($id == 0) {
            
            Banner::create($data);
            return back()->with('message', __("image_created_seccessfullty"));

        } else {
            $banner = Banner::findOrFail($id);
            Storage::delete($banner->image);
            $banner->update($data);
            return back()->with('message', __("image_updated_seccessfullty"));
        }

    }

    private function uploadeImage($file)
    {
        $name = $file->store('banners');
        return $name;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
