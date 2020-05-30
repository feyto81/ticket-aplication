<?php

namespace App\Http\Controllers;

use DB;
use App\Transaction;
use App\Ticket;
use Request;
use App;
use App\Exports\DayTransactionExport;
use App\Exports\JenisExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Setting;

class ReportController extends Controller
{
    public function index()
    {
        $settingall = Setting::all();
        $data = Transaction::where('status', '1')->get();
        return view('backend.report.index', compact('data','settingall'));
    }

    public function day_report()
    {
        $settingall = Setting::all();
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $query = Transaction::where('status', '1')
            ->whereBetween('date', [$date1, $date2])
            ->orderBy('id', 'desc')
            ->get();
        // $query = DB::table('transactions')
        //     ->where('status', '=', '1')
        //     ->whereBetween('date', [$tanggal1, $tanggal2])
        //     ->orderBy('id', 'desc')
        //     ->get();



        $data['data']   =   $query;
        return view('backend.report.index', $data,compact('settingall'));
    }

    public function print_day()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $query = Transaction::where('status', '1')
            ->whereBetween('date', [$date1, $date2])
            ->orderBy('id', 'desc')
            ->get();
        // $query = DB::table('transactions')
        //     ->where('status', '=', '1')
        //     ->whereBetween('date', [$tanggal1, $tanggal2])
        //     ->orderBy('id', 'desc')
        //     ->get();



        $data['data']   =   $query;
        return view('backend.report.print_data', $data);
    }

    public function print_day_pdf()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $query = Transaction::where('status', '1')
            ->whereBetween('date', [$date1, $date2])
            ->orderBy('id', 'desc')
            ->get();
        // $query = DB::table('transactions')
        //     ->where('status', '=', '1')
        //     ->whereBetween('date', [$tanggal1, $tanggal2])
        //     ->orderBy('id', 'desc')
        //     ->get();



        $data['data']   =   $query;
        $view = view('backend.report.print_data', $data)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->download('Report Day Transaction.pdf');
    }

    public function print_day_excel()
    {

        return Excel::download(new DayTransactionExport, 'Transaction Day.xlsx');
    }

    public function month()
    {
        $settingall = Setting::all();
        $data = Transaction::where('status', '1')->get();
        return view('backend.report.month.index', compact('data','settingall'));
    }

     public function month_report()
    {
         $settingall = Setting::all();
        $query = Transaction::where('status', '1')
            ->whereMonth('date',Request::get('bulan'))
            ->get();
        // $query = DB::table('transactions')
        //     ->where('status', '=', '1')
        //     ->whereBetween('date', [$tanggal1, $tanggal2])
        //     ->orderBy('id', 'desc')
        //     ->get();



        $data['data']   =   $query;
        return view('backend.report.month.index', $data,compact('settingall'));
    }

    public function print_month()
    {
        $query = Transaction::where('status', '1')
            ->whereMonth('date', Request::get('bulan'))
            ->get();
        // $query = DB::table('transactions')
        //     ->where('status', '=', '1')
        //     ->whereBetween('date', [$tanggal1, $tanggal2])
        //     ->orderBy('id', 'desc')
        //     ->get();



        $data['data']   =   $query;
        return view('backend.report.month.print', $data);
    }

    public function print_month_pdf()
    {
        
        $query = Transaction::where('status', '1')
            ->whereMonth('date', Request::get('bulan'))
            ->get();
        // $query = DB::table('transactions')
        //     ->where('status', '=', '1')
        //     ->whereBetween('date', [$tanggal1, $tanggal2])
        //     ->orderBy('id', 'desc')
        //     ->get();



        $data['data']   =   $query;
        $view = view('backend.report.month.print', $data)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->download('Report Month Transaction.pdf');
    }

    public function years()
    {
        $settingall = Setting::all();
        $data = Transaction::where('status', '1')->get();
        return view('backend.report.years.index', compact('data','settingall'));
    }

     public function years_report()
    {
        $settingall = Setting::all();
        $query = Transaction::where('status', '1')
            ->whereYear('date',Request::get('tahun'))
            ->get();
        // $query = DB::table('transactions')
        //     ->where('status', '=', '1')
        //     ->whereBetween('date', [$tanggal1, $tanggal2])
        //     ->orderBy('id', 'desc')
        //     ->get();



        $data['data']   =   $query;
        return view('backend.report.years.index', $data,compact('settingall'));
    }

    public function print_years()
    {
        $query = Transaction::where('status', '1')
            ->whereMonth('date', Request::get('tahun'))
            ->get();
        // $query = DB::table('transactions')
        //     ->where('status', '=', '1')
        //     ->whereBetween('date', [$tanggal1, $tanggal2])
        //     ->orderBy('id', 'desc')
        //     ->get();



        $data['data']   =   $query;
        return view('backend.report.years.print', $data);
    }

    public function print_years_pdf()
    {
        
        $query = Transaction::where('status', '1')
            ->whereYear('date', Request::get('tahun'))
            ->get();
        // $query = DB::table('transactions')
        //     ->where('status', '=', '1')
        //     ->whereBetween('date', [$tanggal1, $tanggal2])
        //     ->orderBy('id', 'desc')
        //     ->get();



        $data['data']   =   $query;
        $view = view('backend.report.years.print', $data)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->download('Report Years Transaction.pdf');
    }

}
