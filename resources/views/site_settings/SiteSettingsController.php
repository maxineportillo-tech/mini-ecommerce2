<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SiteSettingsController extends Controller
{
    public function edit()
    {
        $siteName = Setting::where('key', 'site_name')->first();
        return view('site_settings.edit', compact('siteName'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:100',
        ]);

        Setting::updateOrCreate(
            ['key' => 'site_name'],
            ['value' => $request->site_name]
        );

        return redirect()->route('site-settings.edit')->with('success', 'Nombre del sitio actualizado.');
    }
}
