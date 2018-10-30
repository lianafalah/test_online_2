
@extends('admin.template')

@section('content')
<section class="content-header">
      <h1>
        Form Edit transaksi
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_transaksi') }}">Show transaksi</a></li>
        <li class="active">Edit transaksi</li>
      </ol>
    </section>
     
            <section class="content">
             <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" enctype="mu  id="feedback_form" action="{{ route ('transaksi.update',$transaksi->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    
            
                    
                    <div class="form-group ">
                      <label for="severity" class="control-label col-lg-2">Jenis Jransaksi<span class="required">*</span></label>
                      <div class="col-lg-10">
                          <select id="jenis_transaksi" name="jenis_transaksi" class="form-control input-sm m-bot15">
                            @if ($transaksi->jenis_transaksi == 'Pemasukan')
                            <option value="Pemasukan" selected>Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>                   
                          @elseif ($transaksi->jenis_transaksi == 'Pengeluaran')
                            <option value="Pemasukan" >Pemasukan</option>
                            <option value="Pengeluaran" selected>Pengeluaran</option>                  
                                            
                            @endif

                          </select>
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="nama_transaksi" class="control-label col-lg-2">Nama transaksi<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{ $transaksi->nama }}" id="nama" type="text" name="nama" required />
                      </div>
                    </div>
                   
    <div class="form-group" id="nominal" >
              <label for="caption" class="control-label col-lg-2">Nominal</label>
                <div class="col-lg-10">
                  <input class="form-control" id="nominal" type="text" name="nominal" value="{{ $transaksi->nominal }}" />
                </div>
            </div>
            <div class="form-group" id="deskripsi" >
              <label for="caption" class="control-label col-lg-2">Deskripsi</label>
                <div class="col-lg-10">
                  <input class="form-control" id="deskripsi" type="text" name="deskripsi" value="{{ $transaksi->deskripsi }}" />
                </div>
            </div>
                     <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button" onclick="history.go(-1);">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
       
@stop
