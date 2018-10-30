<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use Carbon\Carbon;
use DB;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pemasukan = Transaksi::where('jenis_transaksi','Pemasukan')->sum('transaksi.nominal');
            $pengeluaran = Transaksi::where('jenis_transaksi','Pengeluaran')->sum('transaksi.nominal');
        $saldo = $pemasukan-$pengeluaran;
                $transaksi_list=Transaksi::all();
        return view('transaksi.index',compact('transaksi_list','saldo','pemasukan','pengeluaran')); 
    }
    public function index_bulanan()
    {
        $transaksi_list = Transaksi::where( DB::raw('MONTH(created_at)'), '=', date('n') )->get();
        
      $pemasukan = Transaksi::where('jenis_transaksi','Pemasukan')->sum('transaksi.nominal');
            $pengeluaran = Transaksi::where('jenis_transaksi','Pengeluaran')->sum('transaksi.nominal');
        $saldo = $pemasukan-$pengeluaran;
        return view('transaksi.index',compact('transaksi_list','saldo','pemasukan','pengeluaran')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.input_transaksi'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new transaksi;

        $tambah->jenis_transaksi = $request['jenis_transaksi'];
        $tambah->nama = $request['nama'];
        $tambah->nominal = $request['nominal'];
        $tambah->deskripsi = $request['deskripsi'];
        $tambah->save();

        return redirect()->to('index_transaksi')->with('alert', 'Proses Simpan Berhasil!');
    }
    public function list(){
        return view('transaksi.list_transaksi');
    }
    public function store_list(Request $request)
    {
        $pemasukan = Transaksi::where('jenis_transaksi','Pemasukan')->sum('transaksi.nominal');
            $pengeluaran = Transaksi::where('jenis_transaksi','Pengeluaran')->sum('transaksi.nominal');
        $saldo = $pemasukan-$pengeluaran;
        $tanggal_awal= Carbon::parse($request['tanggal_awal'])->format('Y-m-d');
        $tanggal_akhir= Carbon::parse($request['tanggal_az'])->format('Y-m-d');
        $transaksi_list = Transaksi::whereBetween('transaksi.created_at',[$tanggal_awal,$tanggal_akhir])->get();
             return view('transaksi.index',compact('transaksi_list','saldo','pemasukan','pengeluaran')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Transaksi::where('id', $id)->first();
        $update->jenis_transaksi = $request['jenis_transaksi'];
        $update->nama = $request['nama'];
        $update->nominal = $request['nominal'];
        $update->deskripsi = $request['deskripsi'];
       
        $update->update();
        return redirect()->to('index_transaksi')->with('alert2', 'Data Berhasil! Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
       
        $transaksi->delete();

        return redirect('index_kategori')->with('alert3', 'Data berhasil dihapus!');
    }
}
