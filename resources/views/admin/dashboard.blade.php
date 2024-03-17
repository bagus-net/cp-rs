<!-- start page title -->
@extends('admin.layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h2 class="mb-0">Dashboard</h2>



        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$jmlh_dokter}}</span></h4>
                    <p class="text-muted mb-0">Total Dokter</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$jmlh_layanan_poliklinik}}</span></h4>
                    <p class="text-muted mb-0">Total Layanan Poliklinik</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$jmlh_blog}}</span></h4>
                    <p class="text-muted mb-0">Total Data Blog</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$jmlh_galeri}}</span></h4>
                    <p class="text-muted mb-0">Total Galeri</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card bg-info border-info text-white-50">
            <div class="card-body">
                <h5 class="mb-4 text-white"><i class="uil uil-question-circle me-3"></i>Panduan:</h5>
                <p class="card-text text-white-50">1. Menu Users : Menu untuk mengelola user yang menggunakan aplikasi.</p>
                <p class="card-text text-white-50">2. Menu Rekam Medis : Menu untuk mengelola data rekam medis.</p>
                <p class="card-text text-white-50">3. Menu Pasien : Menu untuk mengelola data pasien.</p>
                <p class="card-text text-white-50">4. Menu Cluster : Menu yang digunakan mengelola perhitungan clustering dengan menggunakan metode K-Means Clustering.</p>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col-md-4 -->
</div>
<!-- end row -->

</div>
<!-- end page title -->
@endsection
@section('script')
<script src="{{ URL::asset('minible/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/js/pages/datatables.init.js') }}"></script>
@endsection