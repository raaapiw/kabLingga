@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List LS-L</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List LS-L</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><center>Tanggal</center></th>
                                <th style="width:50%"><center>Nama IUPOP</center></th>
                                <th><center>No IUP</center></th>
                                <th><center>Masa Berlaku IUP</center></th>
                                <th><center>Rencana Loading</center></th>
                                <th><center>Status LS-L Asli</center></th>
                                <th><center>Status Approve</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->shipping->client->nama_PT }}</td>
                                    <td>{{ $row->shipping->client->no_iup }}</td>
                                    <td>{{ $row->shipping->client->iup_expired }}</td>
                                    <td>{{ $row->shipping->loading_plan }}</td>
                                    <td>
                                        @if (isset($row->name_report))
                                            <span class="label label-success">Sudah Ada</span>
                                        @else
                                            <span class="label label-warning">Belum Ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->state_report == 1)
                                            <span class="label label-success">Sudah Approve</span>
                                        @else
                                            <span class="label label-warning">Belum Approve</span>
                                        @endif
                                    </td>
                                    <td>
                                        <center>
                                            @if (isset($row->name_report))
                                                <a href="{{route('admin.report.form', $row->id)}}"><span><i class="fa fa-pencil"></i></span></a>
                                                <a href="{{route('admin.report.destroy', $row->id)}}"><span><i class="fa fa-trash-o"></i></span></a>
                                                <a href="{{ Storage::url($row->name_report) }}"><span><i class="fa fa-download"></i></span></a>
                                            @else
                                                <a href="{{route('admin.report.destroy', $row->id)}}"><span><i class="fa fa-trash-o"></i></span></a>
                                                {{-- <a href="{{ Storage::url($row->name_report) }}"><span><i class="fa fa-download"></i></span></a> --}}
                                            @endif
                                                {{-- <a href="{{ route('client.document.destroy', $row->id) }}"><span><i class="mdi mdi-delete"></i></span></a> --}}
                                        </center>
                                    </td>
                                </tr>                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<script>$('#myTable').DataTable({
    "order": [[ 0, "asc" ]]
});</script>
@endsection