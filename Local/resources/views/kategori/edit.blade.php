
@extends('admin.template')

@section('content')
<section class="content-header">
      <h1>
        Form Edit kategori
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_kategori') }}">Show kategori</a></li>
        <li class="active">Edit kategori</li>
      </ol>
    </section>
     
            <section class="content">
             <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" enctype="mu  id="feedback_form" action="{{ route ('kategori.update',$kategori->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    
                    <div class="form-group ">
                      <label for="nama_kategori" class="control-label col-lg-2">Nama Kategori<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{ $kategori->nama }}" id="nama" type="text" name="nama" required />
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="severity" class="control-label col-lg-2">Tipe Kategori<span class="required">*</span></label>
                      <div class="col-lg-10">
                          <select id="tipe_kategori" name="tipe_kategori" class="form-control input-sm m-bot15">
                            @if ($kategori->tipe_kategori == 'Pemasukan')
                            <option value="Pemasukan" selected>Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>                   
                          @elseif ($kategori->tipe_kategori == 'Pengeluaran')
                            <option value="Pemasukan" >Pemasukan</option>
                            <option value="Pengeluaran" selected>Pengeluaran</option>                  
                                            
                            @endif

                          </select>
                      </div>
                    </div>
                    
                   
    <div class="form-group" id="deskripsi" >
              <label for="caption" class="control-label col-lg-2">Deskripsi</label>
                <div class="col-lg-10">
                  <input class="form-control" id="deskripsi" type="text" name="deskripsi" value="{{ $kategori->deskripsi }}" />
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
