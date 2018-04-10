@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.1/jquery.fancybox.min.css" />
<link rel="stylesheet" href="{{ Theme::asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary" href="{{action($create)}}" onclick="return confirm('Are you sure you create new data ?');">Create New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php ($no=1) 
                @foreach($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                    <a data-fancybox="gallery" href="{{ url($image.'original/'.$row->file)}}"><img width="30%" height="30%" src="{{ url($image.$row->file)}}"></a>
                      {{-- <img width="20%" height="20%" src="{{url($image.$row->file)}}"></td> --}}
                    <td>
                    <a class="btn btn-primary" href="{{action($edit,$row->id)}}" onclick="return confirm('Are you sure you want to edit this data ?');">Edit</a>
                    <form action="{{action($destroy, $row->id)}}" method="POST">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to edit this data ?');">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@stop
@section('js')
{{-- fancybox --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.1/jquery.fancybox.min.js"></script>
<!-- DataTables -->
<script src="{{ Theme::asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ Theme::asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#dataTable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@stop