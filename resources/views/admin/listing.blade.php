@extends('admin.layout.master')
@section('content')


<link rel="stylesheet" href="{{ asset('public/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css ') }}">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->





<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>{{ $page_name }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">Data table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

            <div class="col-md-12">
                <div class="card">

            @if($message = Session::get('success'))
            <div class="alert alert-success">

                {{ $message }}
                
            </div>
            @endif

                    <div class="card-header">
                        <strong class="card-title">{{ $page_name }}</strong>        
                    </div>
                    <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>fonction</th>
                    <th>debut</th>
                    <th>fin </th>
                    <th>motif</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($liste as $i=>$row)
                    <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->fonction }}</td>
                    <td>{{ $row->debut }}</td>
                    <td>{{ $row->fin }}</td>
                    <td> {{ $row->motif }} </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                    </div>
                </div>
            </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<script src="{{ asset('public/admin/assets/js/vendor/jquery-2.1.4.min.js ') }}"></script>

<script src="{{ asset('public/admin/assets/js/plugins.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/main.js ') }}"></script>

<script src="{{ asset('public/admin/assets/js/lib/data-table/datatables.min.js') }}  "></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/dataTables.buttons.min.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.bootstrap.min.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/jszip.min.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/pdfmake.min.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/vfs_fonts.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.html5.min.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.print.min.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.colVis.min.js ') }}"></script>
<script src="{{ asset('public/admin/assets/js/lib/data-table/datatables-init.js ') }}"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>







@endsection