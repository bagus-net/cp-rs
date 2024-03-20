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
            <h2>Create Layanan Poli</h2>
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
                <form action="{{ route('layanan_poli.add') }}" method="POST" role="form" enctype="multipart/form-data" id="myForm">
                    {{ csrf_field() }}
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Slug:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="slug" value="{{ $slug }}" id="example-text-input" placeholder="Slug" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama Poliklinik:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="poliklinik" value="{{ old('poliklinik') }}" id="example-text-input" placeholder="Nama Poliklinik">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Keterangan:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="ket" value="{{ old('ket') }}" id="example-text-input" placeholder="Keterangan">
                        </div>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary me-2" href="{{ route('layanan_poli.list') }}">Back</a>
                        <button type="submit" class="btn btn-primary">Add Layanan Poli</button>
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

<!-- form editor -->
<script src="{{ URL::asset('minible/assets/libs/ckeditor/ckeditor.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/js/pages/form-editor.init.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#classic-editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    function validateFileSize(input) {
        const maxSize = 2 * 1024 * 1024; // 2MB in bytes
        const fileSize = input.files[0].size;

        if (fileSize > maxSize) {
            document.getElementById('fileSizeError').innerHTML = 'File size exceeds the limit (2MB). Please choose another file.';
            input.value = ''; // Reset input file
        } else {
            document.getElementById('fileSizeError').innerHTML = '';
        }
    }
</script>
@endsection