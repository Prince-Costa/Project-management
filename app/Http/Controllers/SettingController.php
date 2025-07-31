<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!isAdmin()) {
            abort(404);
        }
        
        $settings = Setting::first();
        
        return view('admin.settings.index', compact('settings'));
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
        if (!isAdmin()) {
            abort(404);
        }

        $setting = Setting::find($id);
        $settingData = $request->validate([
            'app_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'site_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable',
            'youtube' => 'nullable',
            'whatsapp' => 'nullable|string|max:20',
            'google' => 'nullable',
            'description' => 'nullable|string',
            'owner_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sign' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
        if ($request->hasFile('logo')) {
            // Remove old logo if exists
            if ($setting->logo && file_exists(public_path($setting->logo))) {
                unlink(public_path($setting->logo));
            }
        
            $logoFile = $request->file('logo');
            $logoName = uniqid() . '_' . $logoFile->getClientOriginalName();
            $logoFile->move(public_path('logo'), $logoName); // Move to public/logo directory
            $settingData['logo'] = 'logo/' . $logoName; // Save only the relative path like 'logo/abc.jpg'
        }
        
        if ($request->hasFile('sign')) {
            if ($setting->sign && file_exists(public_path($setting->sign))) {
                unlink(public_path($setting->sign));
            }
        
            $signFile = $request->file('sign');
            $signName = uniqid() . '_' . $signFile->getClientOriginalName();
            $signFile->move(public_path('sign'), $signName);
            $settingData['sign'] = 'sign/' . $signName;
        }
        
        

        $setting->update($settingData);
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
