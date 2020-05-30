<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use App\Level;
use App\Setting;

class ProfileController extends Controller
{
    public function index()
    {
        $settingall = Setting::all();
        $level = Level::all();
        $user_id = Auth::user()->id;
        $profile = DB::table('users')->where('id', $user_id)
            ->limit(1)->get();
        return view('backend.profile.index', compact('profile', 'level', 'settingall'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:35',
            'email' => 'required|email',

        ]);
        $user_id = Auth::user()->id;
        DB::table('users')->where('id', $user_id)->update($request->except('_token', 'password', 'level_id'));
        \LogActivity::addToLog([
            'data' => 'Mengupdate data  ' . $request->name,
            'user' => $user_id,
        ]);
        alert()->success('Profile Successfully Updated', 'Success');
        return back();
    }
    public function password()
    {
        $settingall = Setting::all();
        return view('backend.profile.changepassword', compact('settingall'));
    }

    public function updatepassword(Request $request)
    {

        $this->validate($request, [
            'oldPassword' => 'required|min:2|max:35',
            'newPassword' => 'required|min:7',
            'confPassword' => 'required|min:7|same:newPassword'

        ]);
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $user_id = Auth::user()->id;

        if (!Hash::check($oldPassword, Auth::user()->password)) {
            alert()->error('The specified password does not match to database password', 'Error');
            return back();
        } else {
            $request->user()->fill(['password' => Hash::make($newPassword)])->save();
            \LogActivity::addToLog([
                'data' => 'Mengubah Password  ',
                'user' => $user_id,
            ]);
            alert()->success('Password has been updated', 'Success');
            return back()->with('msg', '');
        }
    }
}
