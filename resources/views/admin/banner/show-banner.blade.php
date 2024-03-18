@extends('admin.layouts.master')
@section('title')
@lang('Datatables')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('minible/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Banner</h2>
        </div>
    </div>
</div>


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="col-20">
                            <div class="tab-content position-relative" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="bukti" role="tabpanel">
                                    <div class="product-box">
                                        <center>
                                            <h3 class="font-size-30">Banner Image</h3>
                                            <h5 class="font-size-12"><a href="#" class="text-muted">--- Tekan Gambar Untuk Melihat Detail Foto ---</a></h5>
                                        </center>
                                        <div class="product-img pt-4 px-4">
                                            <div class="zoom-gallery">
                                                <center>
                                                    <div class="float-start mb-3">
                                                        <a href="{{asset('storage/banner-image/' .$data->image)}}" title="Bukti Koreksi 1">
                                                            <img src="{{asset('storage/banner-image/' .$data->image)}}" alt="" width="200" heigth="100">
                                                        </a>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="mt-4 mt-xl-3 ps-xl-4">
                            <div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mt-3">
                                                <h3 class="font-size-30 mb-3"><a href="#" class="text-muted">Title Banner</a></h3>
                                                <p class="font-size-17">{{ $data->banner_title}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right"><br><br><br>
                        <a class="btn btn-primary" href="{{ route('banner.list') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{ URL::asset('minible/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/js/pages/datatables.init.js') }}"></script>
@endsection