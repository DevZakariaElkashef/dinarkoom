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
    public function update(Request $request, string $id)
    {
        $exceptions = [
            'logo',
            '_token',
            'facebook_icon',
            'whatsapp_icon',
            'instagram_icon',
            'youtube_icon',
            'linkedin_icon',
            'snapchat_icon',
            'tiktok_icon',
            'pinterest_icon',
            'twitter_icon',
            'home_gif_images',
        ];

        $data = $request->except($exceptions);

        
        if($request->has('facebook_icon')) {
            $data['facebook_icon'] = $request->facebook_icon->store('social');
        } 

        
        if($request->has('whatsapp_icon')) {
            $data['whatsapp_icon'] = $request->whatsapp_icon->store('social');
        } 

        
        if($request->has('instagram_icon')) {
            $data['instagram_icon'] = $request->instagram_icon->store('social');
        } 

        
        if($request->has('youtube_icon')) {
            $data['youtube_icon'] = $request->youtube_icon->store('social');
        } 

        
        if($request->has('linkedin_icon')) {
            $data['linkedin_icon'] = $request->linkedin_icon->store('social');
        } 

        
        if($request->has('snapchat_icon')) {
            $data['snapchat_icon'] = $request->snapchat_icon->store('social');
        } 

        
        if($request->has('tiktok_icon')) {
            $data['tiktok_icon'] = $request->tiktok_icon->store('social');
        } 

        
        if($request->has('pinterest_icon')) {
            $data['pinterest_icon'] = $request->pinterest_icon->store('social');
        } 

        
        if($request->has('twitter_icon')) {
            $data['twitter_icon'] = $request->twitter_icon->store('social');
        } 

        
        if($request->has('logo')) {
            $data['logo'] = $request->logo->store('logo');
        } 
        


        if($id == 0) 
        {
            Setting::create($data);

            return back()->with('message', __("Settings Created Successfully"));
            
        } else {
            $setts = Setting::findOrFail($id);
            
            if ($request->has('logo') && $setts->logo) {
                Storage::delete($setts->logo);
            }
            
            if ($request->has('facebook_icon') && $setts->facebook_icon) {
                Storage::delete($setts->facebook_icon);
            }
            
            if ($request->has('whatsapp_icon') && $setts->whatsapp_icon) {
                Storage::delete($setts->whatsapp_icon);
            }
            
            if ($request->has('instagram_icon') && $setts->instagram_icon) {
                Storage::delete($setts->instagram_icon);
            }
            
            if ($request->has('youtube_icon') && $setts->youtube_icon) {
                Storage::delete($setts->youtube_icon);
            }
            
            if ($request->has('linkedin_icon') && $setts->linkedin_icon) {
                Storage::delete($setts->linkedin_icon);
            }
            
            if ($request->has('snapchat_icon') && $setts->snapchat_icon) {
                Storage::delete($setts->snapchat_icon);
            }
            
            if ($request->has('tiktok_icon') && $setts->tiktok_icon) {
                Storage::delete($setts->tiktok_icon);
            }
            
            if ($request->has('pinterest_icon') && $setts->pinterest_icon) {
                Storage::delete($setts->pinterest_icon);
            }
            
            if ($request->has('twitter_icon') && $setts->twitter_icon) {
                Storage::delete($setts->twitter_icon);
            }

            $setts->update($data);
            
            return back()->with('message', _("Settings Updated Successfully"));
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
