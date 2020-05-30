<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Setting;
use App\User;
use DB;
use App\Ticket;
use App\Category;
use App\Transaction;

class HomeController extends Controller
{


    public function index()
    {
        $transaksi = DB::table('transactions')
            ->join('tickets', 'tickets.id', '=', 'transactions.ticket_id')
            ->join('categories', 'categories.id', '=', 'tickets.category_id')
            ->where('status', '=', 1)
            ->get();
        $category = Category::count();
        $ticket = Ticket::count();
        $user = User::count();
        $transaction = Transaction::where('status', '1')->count();
        $settingall = Setting::all();
        return view('home', compact('settingall', 'category', 'ticket', 'user', 'transaction', 'transaksi'));
    }

    public function login()
    {
        return view('backend.login.login');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('name', 'password'))) {
            alert()->success('Welcome To Ticket Aplication', 'Success');
            return redirect('/home');
        }
        toastr()->error('Maaf Cek Kembali Username Dan Password', 'Gagal');
        return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        toastr()->success('Anda Berhasil Logout', 'Berhasil');
        return redirect('/login');
    }

    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = DB::table('log_activity')
            ->leftJoin('users', 'log_activity.user_id', '=', 'users.id')
            ->select('log_activity.*', 'users.name')
            ->get();
        $user = User::all();
        $settingall = Setting::all();
        $logs = \LogActivity::logActivityLists();
        return view('backend.logactivity.index', compact('logs', 'settingall', 'user'));
    }
}
