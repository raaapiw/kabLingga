@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('material/plugins/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">
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
<div class="row el-element-overlay">
    <div class="col-md-12">
        <h4 class="card-title">Gallery page</h4>
        <h6 class="card-subtitle m-b-20 text-muted">you can make gallery like this</h6></div>
    @foreach($image as $row)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('storage/files/Image/'.$row->evidence) }}{{--../assets/images/big/img1.jpg--}}" alt="user" />
                    <div class="el-overlay">
                        <ul class="el-info">
                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('storage/files/Image/'.$row->evidence) }}"><i class="icon-magnifier"></i></a></li>
                            {{-- <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="el-card-content">
                    <h3 class="box-title">Project title</h3> <small>subtitle of project</small>
                    <br/> 
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
 <!--stickey kit -->
 <script src="{{ asset('material/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
 <script src="{{ asset('material/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
 <!-- Magnific popup JavaScript -->
 <script src="{{ asset('material/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
 <script src="{{ asset('material/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>
 <script src="{{ asset('material/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
 <script src="js/waves.js"></script>
@endsection