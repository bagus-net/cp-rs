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
            <h2>Show Layanan Poli</h2>
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
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Poliklinik:</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="poliklinik" value="{{ $data->poliklinik }}" id="example-text-input" placeholder="Nama Poliklinik">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Keterangan:</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="ket" value="{{ $data->ket }}" id="example-text-input" placeholder="Keterangan">
                    </div>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('layanan_poli.list') }}"> Back</a>
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