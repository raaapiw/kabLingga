@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Shipping</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Shipping</li>
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
                                <th><center>Nama Tongkang</center></th>
                                <th><center>Quantity Final</center></th>
                                <th><center>Action</center></th>
                                <th><center>Approve LS-L</center></th>
                                <th><center>Print LS-L</center></th>
                                {{-- <th><center>Status</center></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shippings as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->client->nama_PT }}</td>
                                    <td>{{ $row->client->no_iup }}</td>
                                    <td>{{ $row->client->iup_expired }}</td>
                                    <td>{{ $row->loading_plan }}</td>
                                    <td>{{ $row->tongkang }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>
                                        <center>
                                                <a href="{{route('admin.shipping.edit', $row->id)}}"><span><i class="fa fa-pencil"></i></span></a> <br>
                                                <a href="{{route('admin.shipping.delete', $row->id)}}"><span><i class="fa fa-trash-o"></i></span></a> <br>
                                                <a href="{{route('admin.shipping.detail', $row->id)}}"><span><i class="fa fa-search"></i></span></a>
                                                {{-- <a href="{{ route('client.document.destroy', $row->id) }}"><span><i class="mdi mdi-delete"></i></span></a> --}}
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            @if (isset($row->report->state))
                                            <span class="label label-success">Sudah Dikirim</span>
                                            {{-- @elseif($row->report->state == 2) --}}

                                            @else
                                            <a href="{{route('admin.shipping.approve', $row->id)}}"><span><i class="fa fa-check-square-o"></i></span></a>                                                                                
                                                
                                            @endif

                                        </center>
                                    </td>
                                    <td>
                                        @if(isset($row->report->state_report))
                                            <center><a target=__blank href="{{ route('admin.shipping.print', $row->id) }}"><span><i class="fa fa-print"></i></span></a></center>
                                        @else
                                            <span class="label label-warning">On Process</span>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if (isset($row->report->state))                                 
                                            <span class="label label-danger">Belum Minta Approve</span>
                                        @elseif($row->report->state == 2)
                                            <span class="label label-success">Sudah Di Approve</span>
                                        @else   
                                            <span class="label label-warning">Sudah Dikirim</span>                                                                             
                                            
                                        @endif
                                    </td> --}}
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