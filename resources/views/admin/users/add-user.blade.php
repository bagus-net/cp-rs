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
            <h2>Create User</h2>
        </div>
    </div>
</div>

@if ($errors->any())
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
                <form action="{{ route('user.add') }}" method="POST" id="myForm">
                    @csrf
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama : </label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" id="example-text-input" placeholder="Nama User">
                        </div>
                        <br><br>
                        <label for="example-text-input" class="col-md-2 col-form-label">Password : </label>
                        <div class="col-md-10">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                        </div>
                        <br><br>
                        <label for="example-text-input" class="col-md-2 col-form-label">Email : </label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="email" value="{{ old('email') }}" id="example-text-input" placeholder="Email">
                        </div>
                        <br><br>
                        <div class="mb-3 row">
                            <label for="image" class="form-label col-md-2">Image</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="validateFileSize(this)">
                                <small class="text-muted">Ukuran file maksimal: 2MB</small>
                                <div id="fileSizeError" class="text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('user.list') }}"> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="modal fade bs-example-modal-xl" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                Apakah anda ingin memproses data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-success" id="confirmSubmit">Iya</button>
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