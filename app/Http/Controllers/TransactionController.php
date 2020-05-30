<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Transaction;
use App\Setting;
use Auth;

class TransactionController extends Controller
{
    public function add_transaction()
    {
        $settingall = Setting::all();
        $ticket = Ticket::all();
        $transaction = Transaction::where('status', '0')->get();
        return view('backend.transaction.add', compact('ticket', 'transaction', 'settingall'));
    }

    public function save_transaction(Request $request)
    {
        $this->validate($request, [
            'customer' => 'required',
            'qty' => 'required|numeric',

        ]);
        $user_id = Auth::user()->id;
        $transaction = new Transaction;
        $transaction->fill($request->all());
        \LogActivity::addToLog([
            'data' => 'Melakukan Transaksi ' . $request->customer,
            'user' => $user_id,
        ]);
        $result = $transaction->save();
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        if ($result) {
            return back();
        } else {
            return back();
        }
    }

    public function delete_transaction($id)
    {
        $user_id = Auth::user()->id;
        $transaction = Transaction::find($id);
        $customer = $transaction->customer;
        $transaction->delete();
        \LogActivity::addToLog([
            'data' => 'Menghapus Transaksi customer ' . $customer,
            'user' => $user_id,
        ]);
        return back();
    }

    public function uproaf()
    {
        $user_id = Auth::user()->id;
        $transaction = Transaction::where('status', '0');
        $transaction->update(['status' => '1']);
        \LogActivity::addToLog([
            'data' => 'Menguproaf Transaksi customer ',
            'user' => $user_id,
        ]);
        alert()->success('Transaction Success', 'Success');
        return redirect()->back();
    }
}
