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
            <h2>Edit Blog</h2>
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
                <form action="{{ route('blog.update',$find->id) }}" method="POST" role="form" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Slug : </label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="slug" value="{{ $find->slug }}" id="example-text-input" placeholder="Slug" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Title : </label>
                        <div class="col-md-10">
                            <input type="text" name="title" value="{{ $find->title }}" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Category : </label>
                        <div class="col-md-10">
                            <select name="category_id" id="userSelectCategory" class="form-select" aria-label="Floating label select">
                                @foreach ($res_kategori_post as $item)
                                @if ($find->category_id == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->kategori}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->kategori}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="image" class="form-label col-md-2">Image</label>
                        <div class="col-md-10">
                            @if($find->image)
                            <img src="{{ asset('storage/blog-image/' . $find->slug . '/' . $find->image) }}" alt="Current Image" style="max-width:100px; margin-top: 10px;">
                            @endif
                            <input class="form-control" type="file" name="image" id="image" onchange="validateFileSize(this)">
                            <small class="text-muted">Ukuran file maksimal: 2MB</small>
                            <div id="fileSizeError" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Content:</label>
                        <div class="col-md-10">
                            <!-- <input class="form-control" type="text" name="body" value="{{ $find->body }}" id="example-text-input" placeholder="Content"> -->
                            <textarea id="body" class="form-control" name="body" rows="10">{!! $find->body !!}</textarea>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('blog.list') }}"> Back</a>
                        <button type="submit" class="btn btn-primary">Update Blog</button>
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

<!-- form editor -->
<script src="{{ URL::asset('minible/assets/libs/ckeditor/ckeditor.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('minible/assets/js/pages/form-editor.init.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    function validateFileSize(input) {
        const maxSize = 2 * 1024 * 1024; // 2MB in bytes
        const fileSize = input.files[0].size;

        if (fileSize > maxSize) {
            document.getElementById('fileSizeError').innerHTML = 'Ukuran file melebihi batas (2MB). Pilih file lain.';
            input.value = ''; // Reset input file
        } else {
            document.getElementById('fileSizeError').innerHTML
            = '';
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
