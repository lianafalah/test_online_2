@extends('admin.template')
@section('content')
 <section class="content-header">
      <h1 style="text-align: center;">
        Input Kategori

      </h1>
      
    </section>
<section class="content">
<div class="row">
          <div class="col-lg-12">
            <section class="panel" >  

<div class="panel-body">
  <div class="form">
  <form class="form-validate form-horizontal" action="{{ Route('kategori.store') }}" id="feedback_form" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group ">
      <label for="nama" class="control-label col-lg-2">Nama</label>
        <div class="col-lg-10">
          <input class="form-control "  id="nama" type="text" name="nama" required   />
        </div>
    </div>
      
     <div class="form-group">
      <label for="status" class="control-label col-lg-2">Tipe Kategori</label>
        <div class="col-lg-10">
                          <select name="tipe_kategori" class="form-control input-sm m-bot15">
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                          </select>
                      </div>
    </div>
    
    <div class="form-group" id="deskripsi" >
              <label for="deskripsi" class="control-label col-lg-2">Deskripsi</label>
                <div class="col-lg-10">
                  <input class="form-control" id="deskripsi" type="text" name="deskripsi"  />
                </div>
            </div>
     
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button class="btn btn-primary" type="submit">Save</button>
            <button type="reset" class="btn btn-default" onclick="history.go(-1);">Cancel</button>
        </div>
      </div>
  </form>
</div>
</div>
</section>
</div>
</div>
</section>
@endsection
@push('js')
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
         $("#gambar").change(function () {
        readURL(this);
        });
</script>

<script type="text/javascript">
        function show2() {
            document.getElementById("caption").style.display = "block";
        }
    </script>    

@endpush
                  

