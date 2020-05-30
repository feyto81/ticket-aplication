<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use DB;
use Auth;

class SettingController extends Controller
{
    public function edit_setting($id)
    {
        $settingall = Setting::all();
        $setting = DB::table('settings')->where('id', $id)->first();
        return view('backend.setting.all', compact('setting', 'settingall'));
    }

    public function update_setting(Request $request, $id)
    {
        $this->validate($request, [
            'title_admin' => 'required|min:2',
            'title_login' => 'required',
            'dashboard' => 'required',
            'category' => 'required',
            'ticket' => 'required',
            'transaction' => 'required',
            'report' => 'required',
            'user' => 'required',
            'setting' => 'required',
            'my_profile' => 'required',
            'change_password' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $setting = Setting::find($id);
        $setting->fill($request->all());
        \LogActivity::addToLog([
            'data' => 'Mengupdate Setting  ',
            'user' => $user_id,
        ]);
        $setting->update();

        alert()->success('Setting Successfully Updated', 'Berhasil');
        //return back();
        return back();
    }
}
