@extends('admin.layouts.master')
@section('title')
@lang('Layanan Poliklinik Detail')
@endsection

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('minible/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Layanan Poliklinik Detail</h2>
        </div>
    </div>
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
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
                        <p class="form-control-static">{{ $data->slug }}</p>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Poliklinik:</label>
                    <div class="col-md-10">
                        <p class="form-control-static">{{ $data->poliklinik }}</p>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Keterangan:</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="ket" id="keterangan" placeholder="Keterangan" readonly>{{ $data->ket }}</textarea>
                    </div>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('layanan_poli.list') }}"> Kembali</a>
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
    tinymce.init({
        selector: '#keterangan'
    });
</script>
@endsection
