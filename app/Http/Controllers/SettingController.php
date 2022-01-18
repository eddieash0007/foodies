<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view ('admin.settings')->with('settings', $settings);
    }

    public function update(Request $request)
    {
        $settings = Setting::first();

        if($request->hasFile('logo'))
        {
            $image = $request->logo;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/logo', $image_new_name);

            $settings->logo = 'uploads/logo/'.$image_new_name;
        }

        // $settings->logo = $request->logo;
        $settings->about = $request->about;
        $settings->save();
        
        Alert::toast('Settings Updated successfully','success')->position('top-end');
        return redirect()->back();
    }
}
