@extends('layouts.admin_app')
@section('custom_style')
  <!-- <style type="text/css">
    .actions{
      display: none;
    }
    tr:hover .actions {
      display: block;
    }
    @keyframes slideInFromLeft {
      0% {
        transform: translateX(-100%);
      }
      100% {
        transform: translateX(0);
      }
    }
    .progress_trans {
      /* This section calls the slideInFromLeft animation we defined above */
      animation: 2s ease-out 0s 1 slideInFromLeft;
    }
  </style> -->
@endsection
@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Manage car model</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">
                  <a href="{{route('carmodels.create')}}" class="btn btn-success float-right">Add New Car model</a>
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
                <h3 class="card-title">Car model List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Brand</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($carmodels as $key => $carmodel)
                      <tr>
                        <td>{{$key+1}}</td>

                        <td>{{$carmodel->name}}</td>
                        <td>{{$carmodel->brand->name}}</td>
                        <td width="10%" class="p-0 pt-3">
                            <div class="actions text-center">
                              <span>
                                <a href="{{url('/carmodels/'.$carmodel->id.'/edit')}}">
                                  Edit
                                </a>
                              </span> | <span>
                                <a style="cursor: pointer;color: red;" onclick="deleteConfirm( {{$carmodel->id}},'{{$carmodel->name}}')">Delete</a>
                                <a href="{{route('carmodels.destroy',$carmodel->id)}}" id="deleteClick{{$carmodel->id}}" style="color: red; visibility: hidden;"></a>
                                <form action="{{ url('/carmodels', ['id' => $carmodel->id]) }}" method="post" id="delete{{$carmodel->id}}">
                                  <!-- <input class="btn btn-default" type="submit" value="Delete" /> -->
                                  @method('delete')
                                  @csrf
                                </form>
                              </span>
                            </div>
                        </td>
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
    var confirmDelete = confirm("Are you sure, you want to delete category "+name+" ?");
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
