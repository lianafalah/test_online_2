<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $kategori_list=Kategori::all();
         
        return view('kategori.index',compact('kategori_list')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.input_kategori'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new kategori;

        $tambah->nama = $request['nama'];
        $tambah->tipe_kategori = $request['tipe_kategori'];
        $tambah->deskripsi = $request['deskripsi'];
        $tambah->save();

        return redirect()->to('index_kategori')->with('alert', 'Proses Simpan Berhasil!');
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
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
        $update = Kategori::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->tipe_kategori = $request['tipe_kategori'];
        $update->deskripsi = $request['deskripsi'];
       
        $update->update();
        return redirect()->to('index_kategori')->with('alert2', 'Data Berhasil! Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
       
        $kategori->delete();

        return redirect('index_kategori')->with('alert3', 'Data berhasil dihapus!');
    }
}
