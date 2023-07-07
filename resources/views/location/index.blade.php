@extends('layouts.admin_app')

@section('main_content')

<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Manage </h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">
                  <a href="{{url('add_location')}}" class="btn btn-success float-right">Add New Location</a>
                  </li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Small boxes (Stat box) -->
        <div class="">
            @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Locations List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    @php
                        $sr =0;
                    @endphp


                    <tr>
                      <th class="text-center">sr</th>
                      <th class="text-center">Location</th>
                      <th class="text-center">Price</th>
                      <th class="text-center" colspan="2">Actions</th>
                    </tr>

                  </thead>
                  <tbody>

                    @foreach ($location as $data )
                    @php
                        $sr++;
                    @endphp
                  <tr class="text-center">
                  <td>{{$sr}}</td>
                  <td>{{$data->location}}</td>
                  <td>{{$data->price}}</td>
                  <td> <a class="btn btn-success" href="{{url('location_edit/'.$data->id)}}"> Edit</a> </td>
                  <td><a class="btn btn-danger" href="{{url('location_delete/'.$data->id)}}"> Delete</a></td>
                  </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right" style="display: none;">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('custom_scripts')
<script type="text/javascript">

function deleteConfirm(id,name){
    var confirmDelete = confirm("Are you sure, you want to delete Product "+name+" ?");
    var divId = "#deleteClick"+id;
    if(confirmDelete)
    {
      // $(divId)[0].click();
      $('form#delete'+id).submit();
    }else{

    }
  }
  $("document").ready(function(){
    setTimeout(function(){
       $("p.alert").remove();
    }, 5000 ); // 5 secs

});
</script>
@endsection
