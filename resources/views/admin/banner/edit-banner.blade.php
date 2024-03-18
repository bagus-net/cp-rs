@extends('admin.layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('minible/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Banner</h2>
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
                <form action="{{ route('banner.update',$data->id) }}" method="POST" role="form" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Banner Title : </label>
                        <div class="col-md-10">
                            <input type="text" name="banner_title" value="{{ $data->banner_title }}" class="form-control" placeholder="Banner Title">
                        </div>
                        <br><br>
                        <label for="image" class="form-label">Banner Image</label>
                        <br>
                        @if($data->image)
                        <img src="{{asset('storage/banner-image/' . $data->image)}}" alt="Current Image" style="max-width:100px; margin-top: 10px;">
                        @endif
                        <br>
                        <input class="form-control" type="file" name="image" id="image" onchange="validateFileSize(this)">
                        <small class="text-muted">Ukuran file maksimal: 2MB</small>
                        <div id="fileSizeError" class="text-danger"></div>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('banner.list') }}"> Back</a>
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

    $(document).ready(function() {
        let isConfirmed = false;

        $("#myForm").on("submit", function(e) {
            if (!isConfirmed) {
                e.preventDefault();
                $("#konfirmasiModal").modal('show');
            }
        });

        $("#confirmSubmit").on("click", function() {
            isConfirmed = true;
            $("#myForm").submit();
            $("#konfirmasiModal").modal('hide');
        });
    });
</script>
@endsection