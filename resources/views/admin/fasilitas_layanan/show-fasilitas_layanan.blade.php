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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Slug:</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="slug" value="{{ $data->slug }}" id="example-text-input" placeholder="Slug" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Fasilitas:</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="nama_fasilitas" value="{{ $data->nama_fasilitas }}" id="example-text-input" placeholder="Nama Fasilitas">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Category:</label>
                    <div class="col-md-10">
                        <select name="kategori" class="form-select">
                            @if(old('kategori', $data->kategori) == 'Fasilitas Layanan Kesehatan')
                            <option value="Fasilitas Layanan Kesehatan" selected>Fasilitas Layanan Kesehatan</option>
                            <option value="Fasilitas Penunjang Medis">Fasilitas Penunjang Medis</option>
                            <option value="Fasilitas Layanan Unggulan">Fasilitas Layanan Unggulan</option>

                            @elseif(old('kategori', $data->kategori) == 'Fasilitas Penunjang Medis')
                            <option value="Fasilitas Penunjang Medis" selected>Fasilitas Penunjang Medis</option>
                            <option value="Fasilitas Layanan Kesehatan">Fasilitas Layanan Kesehatan</option>
                            <option value="Fasilitas Layanan Unggulan">Fasilitas Layanan Unggulan</option>

                            @else
                            <option value="Fasilitas Layanan Unggulan" selected>Fasilitas Layanan Unggulan</option>
                            <option value="Fasilitas Penunjang Medis">Fasilitas Penunjang Medis</option>
                            <option value="Fasilitas Layanan Kesehatan">Fasilitas Layanan Kesehatan</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="image" class="col-md-2 col-form-label">Image:</label>
                    <div class="col-md-10">
                        @if($data->image)
                        <img src="{{ asset('storage/fasilitas_layanan-image/' . $data->slug . '/' . $data->image) }}" alt="Current Image" style="max-width:100px; margin-top: 10px;">
                        @endif
                        <input class="form-control" type="file" name="image" id="image" onchange="validateFileSize(this)">
                        <small class="text-muted">Ukuran file maksimal: 2MB</small>
                        <div id="fileSizeError" class="text-danger"></div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Keterangan:</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="ket" value="{{ old('ket') }}" id="example-text-input" placeholder="Content">
                    </div>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('fasilitas_layanan.list') }}"> Back</a>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection

@section('script')
<script src="{{ URL::asset('minible/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/js/pages/datatables.init.js') }}"></script>
@endsection