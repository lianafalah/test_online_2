@extends('admin.template')
@section('content')

<div class="content">
<section class="content-header ">
      <h1>
        Data Kategori
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Data kategori</li>
      </ol>
    </section>

          <div class="box">
            <a href="{{ route ('kategori.create')}}"><button type="button" class="btn bg-maroon btn-flat margin">Tambah Data</button></a>
            <div class="box-body">
               @if (!empty($kategori_list))
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Tipe Kategori</th>
                   <th>Deskripsi</th>
                   <th>Tanggal</th>
                                      
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach( $kategori_list as $kategori): ?>
                  <tr>
                   
                    <td>{{ $kategori->nama}} </td>
                    <td>{{ $kategori->tipe_kategori }} </td>
                    
                    <td>{{ $kategori->deskripsi }} </td>
                    <td>{{ $kategori->created_at}} </td>
                    
                    <td>

                      <div class="btn-group">
                        {!! Form::open(['method'=> 'DELETE','route' => ['kategori.destroy', $kategori->id ], 'onsubmit' =>'return myConfirm(this)']) !!}

                          <a class="btn btn-primary" href="{{ route ('kategori.edit',$kategori->id) }}"><i class="fa fa-pencil"></i></a>
                         <!--  <a class="btn btn-success" href="{{ route ('kategori.show',$kategori->id) }}"><i class="fa fa-eye"></i></a> -->
                          <button class="btn btn-danger"  type="submit" ><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                      </div>           

                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                
              </table>
              @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </div>


    @stop

@section('java')
<script type="text/javascript">
  $(document).ready(function(){
    $('example1').DataTable({
      "scrollX" : true
    });

  });
  $(function () {

    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'scrollX' : true
    })
  })

// $('#example1').dataTable({
//   "fnInitComplete": function() {
//     $('#example1').find('.dataTable_scrollbar').jScrollPane();
//   },
//   "sScrollY": "500px"
// });
</script>
<script type="text/javascript">
  function myConfirm(e) {
  swal({
    title: "Hapus nih?",
    text: "Beneran mau dihapus?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {

    if (willDelete) {
      swal("Udah dihapus",{
        icon: "success",
      });
      e.submit();
      return true;
    } else {
      swal("belum kehapus kok aman ");
    }
  });
    return false;
}
 @if(session('alert'))
 swal({

  icon: "success",
  title: "Data Berhasil Disimpan",
});

  @endif
  
   @if(session('alert2'))
 swal({

  icon: "success",
  title: "Data Berhasil DiUbah",
});

  @endif

</script>
@stop

