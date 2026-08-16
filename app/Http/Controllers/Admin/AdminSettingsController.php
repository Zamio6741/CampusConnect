<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    /**
     * Display the admin settings page.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Load settings once
        |--------------------------------------------------------------------------
        |
        | The settings page contains many fields. Loading them once and
        | keying them by their setting key prevents the Blade template
        | from making a separate database query for every field.
        |
        */

        $settings = Setting::orderBy('group')
            ->orderBy('key')
            ->get()
            ->keyBy('key');

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update admin settings.
     */
    public function update(Request $request)
    {
        $submittedSettings = $request->input('settings', []);

        /*
        |--------------------------------------------------------------------------
        | Load all settings once
        |--------------------------------------------------------------------------
        */

        $existingSettings = Setting::all();

        foreach ($existingSettings as $setting) {

            $key = $setting->key;

            /*
            |--------------------------------------------------------------------------
            | Boolean Settings
            |--------------------------------------------------------------------------
            |
            | HTML checkboxes are not submitted when unchecked.
            | request->boolean() correctly converts a missing checkbox
            | into false / "0".
            |
            */

            if ($setting->type === 'boolean') {

                $setting->value = $request->boolean("settings.$key")
                    ? '1'
                    : '0';
            }

            /*
            |--------------------------------------------------------------------------
            | Other Settings
            |--------------------------------------------------------------------------
            */

            elseif (array_key_exists($key, $submittedSettings)) {

                $setting->value = $submittedSettings[$key];
            }

            $setting->save();
        }

        return redirect()
            ->route('admin.settings')
            ->with('success', 'Settings updated successfully.');
    }
}