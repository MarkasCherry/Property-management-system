<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function privacyPolicy()
    {
        $setting = Setting::find(Setting::PRIVACY_POLICY);

        return view('settings.privacy-policy', compact('setting'));
    }

    public function updatePrivacyPolicy(Request $request)
    {
        Setting::updateOrCreate([
            'id' => Setting::PRIVACY_POLICY
        ], [
            'name' => 'Privacy Policy',
            'value' => $request->value
        ]);

        return redirect()->back()->with('success', ' You have successfully updated privacy policy');
    }
}
