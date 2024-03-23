@extends('admin.layouts.master')
@section('title')
@lang('translation.Add_Kategori')
@endsection

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('minible/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('minible/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create Jadwal Dokter</h2>
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
                <form action="{{ route('jadwal_dokter.add') }}" method="POST" role="form" enctype="multipart/form-data" id="myForm">
                    {{ csrf_field() }}
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama Dokter : </label>
                        <div class="col-md-10">
                            <select name="dokter_id" id="userSelectCategory" class="form-select" aria-label="Floating label select">
                                @foreach ($res_dokters as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Poliklinik : </label>
                        <div class="col-md-10">
                            <select name="poliklinik_id" id="userSelectCategory" class="form-select" aria-label="Floating label select">
                                @foreach ($res_layanan_polikliniks as $item)
                                <option value="{{$item->id}}">{{$item->poliklinik}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Hari:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="hari" value="{{ old('hari') }}" id="example-text-input" placeholder="Hari">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Dari Jam:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="time" name="dari" value="{{ old('dari') }}" id="example-text-input" placeholder="Dari Jam">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Sampai Jam:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="time" name="sampai" value="{{ old('sampai') }}" id="example-text-input" placeholder="Sampai Jam">
                        </div>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary me-2" href="{{ route('dokter.list') }}">Back</a>
                        <button type="submit" class="btn btn-primary">Add Jadwal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-xl" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to proceed with this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-success" id="confirmSubmit">Yes</button>
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
<script src="{{ URL::asset('minible/assets/libs/datepicker/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection