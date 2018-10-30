<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $pemasukan = Transaksi::where('jenis_transaksi','Pemasukan')->sum('transaksi.nominal');
            $pengeluaran = Transaksi::where('jenis_transaksi','Pengeluaran')->sum('transaksi.nominal');
        $saldo = $pemasukan-$pengeluaran;
        
        return view('home',compact('saldo','pemasukan','pengeluaran'));
    }
}
