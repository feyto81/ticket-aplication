<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Setting;

class UserController extends Controller
{
    public function add_user()
    {
        $settingall = Setting::all();
        return view('backend.user.add',compact('settingall'));
    }

    public function save_user(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level_id = $request->level_id;
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if ($result) {
            alert()->success('User Successfully Add', 'Success');
            return redirect('/all-user');
        } else {
            alert()->error('User Gagal Ditambahkan', 'Berhasil');
            return back();
        }
    }
    public function all_user()
    {
        $settingall = Setting::all();
        $user = User::all();
        return view('backend.user.all', compact('user','settingall'));
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        alert()->success('User Successfully Deleted', 'Berhasil');
        return back();
    }

    public function edit_user($id)
    {
        $settingall = Setting::all();
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user','settingall'));
    }
    public function update_user(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email',
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->level_id = $request->get('level_id');
        if ($request->get('password') != '') {
            $user->password = Hash::make($request->get('password'));
        }

        $aks = $user->save();
        if ($aks) {
            alert()->success('User Successfully Updated', 'Success');
            return redirect('/all-user');
        } else {
            return back();
        }
    }
}
