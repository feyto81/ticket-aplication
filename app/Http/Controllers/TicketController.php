<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Ticket;
use App\Setting;
use Auth;

class TicketController extends Controller
{
    public function add_ticket()
    {
        $settingall = Setting::all();
        $category = Category::all();
        return view('backend.ticket.add', compact('category','settingall'));
    }

    public function save_ticket(Request $request)
    {
        $this->validate($request, [
            'ticket_name' => 'required|min:2|unique:tickets',
            'ticket_price' => 'required|numeric',
            'number_of_tickets' => 'required',
            'category_id' => 'required',
            'ticket_type' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $ticket = new Ticket;
        $ticket->fill($request->all());
        $result = $ticket->save();
         \LogActivity::addToLog([
            'data' => 'Menambahkan Ticket '.$request->ticket_name,
            'user' => $user_id,
            ]);
        // 
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        if ($result) {
            alert()->success('Ticket Berhasil Ditambahkan', 'Berhasil');
            return redirect('/all-ticket');
        } else {
            alert()->error('Ticket Gagal Ditambahkan', 'Berhasil');
            return back();
        }
    }

    public function all_ticket()
    {
        $settingall = Setting::all();
        $ticket = Ticket::all();
        return view('backend.ticket.index', compact('ticket','settingall'));
    }

    public function edit_ticket($id)
    {
        $settingall = Setting::all();
        $category = Category::all();
        $ticket = Ticket::with('category')->get();
        $ticket = Ticket::findOrFail($id);
        return view('backend.ticket.edit', compact('ticket', 'category','settingall'));
    }

    public function update_ticket(Request $request, $id)
    {
        $this->validate($request, [
            'ticket_name' => 'required|min:2',
            'ticket_price' => 'required|numeric',
            'number_of_tickets' => 'required',
            'category_id' => 'required',
            'ticket_type' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $ticket = Ticket::find($id);
        $ticket->fill($request->all());
        $ticket->update();
         \LogActivity::addToLog([
            'data' => 'Mengedit Ticket '.$request->ticket_name,
            'user' => $user_id,
            ]);
        // 
        alert()->success('Ticket Successfully Updated', 'Berhasil');
        //return back();
        return redirect('/all-ticket');
    }

    public function delete_ticket($id)
    {
        $data = Ticket::findOrFail($id);
        $ticket_name = $data->ticket_name;
        $user_id = Auth::user()->id;
        $ticket = Ticket::find($id);
        \LogActivity::addToLog([
            'data' => 'Menghapus Ticket '.$ticket_name,
            'user' => $user_id,
        ]);
        $ticket->delete();
        alert()->success('Ticket Successfully Deleted', 'Berhasil');
        return back();
    }
}
