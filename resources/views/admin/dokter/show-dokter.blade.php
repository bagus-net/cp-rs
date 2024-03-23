@extends('admin.layouts.master')
@section('title')
@lang('Datatables')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('minible/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    .banner-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .banner-container img {
        max-width: 100%;
        height: auto;
    }

    .data-container {
        margin-top: 20px;
    }

    .data-container .row {
        margin-bottom: 10px;
    }

    .data-container label {
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Dokter</h2>
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

<div class="banner-container">
    @if($find->image)
    <img src="{{asset('storage/dokter-image/' . $find->slug . '/' . $find->image)}}" alt="Banner Image" width="500" height="500">
    @endif
</div>

<div class="data-container">
    <div class="row">
        <label class="col-md-2">Slug :</label>
        <div class="col-md-4">{{ $find->slug }}</div>
    </div>

    <div class="row">
        <label class="col-md-2">Nama Dokter :</label>
        <div class="col-md-4">{{ $find->nama }}</div>
    </div>

    <div class="row">
        <label class="col-md-2">Jenis Kelamin :</label>
        <div class="col-md-4">{{ $find->jenis_kelamin }}</div>
    </div>

    <div class="row">
        <label class="col-md-2">Tanggal Lahir :</label>
        <div class="col-md-4">{{ $find->tanggal_lahir }}</div>
    </div>

    <div class="row">
        <label class="col-md-2">No Handphone :</label>
        <div class="col-md-4">{{ $find->no_hp }}</div>
    </div>

    <div class="row">
        <label class="col-md-2">Email :</label>
        <div class="col-md-4">{{ $find->email }}</div>
    </div>

    <div class="row">
        <label class="col-md-2">Alamat Domisili :</label>
        <div class="col-md-4">{{ $find->alamat_domisili }}</div>
    </div>

    <div class="row">
        <label class="col-md-2">Poliklinik :</label>
        <div class="col-md-4">{{ $find->poliklinik_id }}</div>
    </div>

    <div class="row">
        <label class="col-md-2">Riwayat Dokter :</label>
        <div class="col-md-4">{{ $find->riwayat }}</div>
    </div>
</div>

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('dokter.list') }}"> Back</a>
</div>

@endsection

@section('script')
<script src="{{ URL::asset('minible/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/js/pages/datatables.init.js') }}"></script>
<script>
    function validateFileSize(input) {
        const maxSize = 2 * 1024 * 1024; // 2MB in bytes
        const fileSize = input.files[0].size;

        if (fileSize > maxSize) {
            document.getElementById('fileSizeError').innerHTML = 'Ukuran file melebihi batas (2MB). Pilih file lain.';
            input.value = ''; // Reset input file
        } else {
            document.getElementById('fileSizeError').innerHTML = '';
        }
    }
</script>
@endsection
