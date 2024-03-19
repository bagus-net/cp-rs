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

<div class="row">
    <div class="col-md-6">
        @if($find->image)
        <img src="{{asset('storage/dokter-image/' . $find->slug . '/' . $find->image)}}" alt="Current Image" style="max-width:100%;">
        @endif
    </div>
    <div class="col-md-6">
        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-4 col-form-label">Slug:</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="slug" value="{{ $find->slug }}" id="example-text-input" placeholder="Slug" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-4 col-form-label">Nama Dokter:</label>
            <div class="col-md-8">
                <input type="text" name="nama" value="{{ $find->nama }}" class="form-control" placeholder="Nama Dokter" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-4 col-form-label">Jenis Kelamin:</label>
            <div class="col-md-8">
                <input type="text" name="jenis_kelamin" value="{{ $find->jenis_kelamin }}" class="form-control" placeholder="Jenis Kelamin" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-4 col-form-label">Tanggal Lahir:</label>
            <div class="col-md-8">
                <input type="text" name="tanggal_lahir" value="{{ $find->tanggal_lahir }}" class="form-control" placeholder="Tanggal Lahir" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-4 col-form-label">No Handphone:</label>
            <div class="col-md-8">
                <input type="text" name="no_hp" value="{{ $find->no_hp }}" class="form-control" placeholder="No Handphone" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-4 col-form-label">Email:</label>
            <div class="col-md-8">
                <input type="text" name="email" value="{{ $find->email }}" class="form-control" placeholder="Email" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-4 col-form-label">Alamat Domisili:</label>
            <div class="col-md-8">
                <input type="text" name="alamat_domisili" value="{{ $find->alamat_domisili }}" class="form-control" placeholder="Alamat Domisili" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-4 col-form-label">Poliklinik:</label>
            <div class="col-md-8">
                <input type="text" name="poliklinik" value="{{ $find->poliklinik->poliklinik }}" class="form-control" placeholder="Poliklinik" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-4 col-form-label">Riwayat Dokter:</label>
            <div class="col-md-8">
                <input type="text" name="riwayat" value="{{ $find->riwayat }}" class="form-control" placeholder="Riwayat Dokter" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('dokter.list') }}"> Back</a>
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
