@extends('layouts.admin_app')
@section('main_content')
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 pl-0">
                    <h1 class="m-0 text-dark">Manage Orders</h1>
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
                <h3 class="card-title">Appoinment List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            {{-- <th>Status</th> --}}
                            <th>Date</th>
                            <th>Amount</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sr=1;
                        @endphp
                        @foreach($result as $key => $order)
                        <tr>
                            <td>{{$sr++}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->number}}</td>
                            {{-- <td>Processing</td> --}}
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->price}}K.D</td>

                            <td width="10%" class="p-0 pt-3">
                                <div class="actions text-center d-flex mx-2">

                                        <a href="{{url('/appoinment-detail/'.$order->id)}}" class="btn btn-sm btn-primary m-1">
                                            Detail
                                        </a>
                                        <a href="{{url('/appoinment-delete/'.$order->id)}}" class="btn btn-sm btn-danger m-1">
                                            Delete
                                        </a>
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
    function deleteConfirm(id, name) {
        var confirmDelete = confirm("Are you sure, you want to delete order " + name + " ?");
        var divId = "#deleteClick" + id;
        if (confirmDelete) {
            // $(divId)[0].click();
            $('form#delete' + id).submit();
        } else {

        }
    }
    $("document").ready(function() {
        setTimeout(function() {
            $("p.alert").remove();
        }, 5000); // 5 secs

    });
</script>
@endsection
