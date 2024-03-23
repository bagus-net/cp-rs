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
            <h2>Show Banner</h2>
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
                <form action="{{ route('dokter.update',$find->id) }}" method="POST" role="form" enctype="multipart/form-data" id="myForm">
                    {{ csrf_field() }}
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Slug : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="slug" value="{{ $find->slug }}" id="example-text-input" placeholder="Slug">
                        </div>
                    </div>

                    <!-- Place image on the right -->
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Banner Image : </label>
                        <div class="col-md-4">
                            @if($find->image)
                            <img src="{{asset('storage/dokter-image/' . $find->slug . '/' . $find->image)}}" alt="Current Image" style="max-width:100px; margin-top: 10px;">
                            @endif
                            <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="validateFileSize(this)">
                            <small class="text-muted">Ukuran file maksimal: 2MB</small>
                            <div id="fileSizeError" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama Dokter : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="nama" value="{{ $find->nama }}" id="example-text-input" placeholder="Nama Dokter">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-4">
                            <select name="jenis_kelamin" class="form-select">
                                <option value="Laki-Laki" @if (old('jenis_kelamin')=='Laki-Laki' ) selected="selected" @endif>Laki-Laki</option>
                                <option value="Perempuan" @if (old('jenis_kelamin')=='Perempuan' ) selected="selected" @endif>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Tanggal Lahir : </label>
                        <div class="col-md-4">
                            <div class="input-group" id="datepicker1">
                                <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="yyyy-mm-dd" data-date-container='#datepicker1' data-provide="datepicker" value="{{ $find->tanggal_lahir }}" name="tanggal_lahir">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">No Handphone : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="no_hp" value="{{ $find->no_hp }}" id="example-text-input" placeholder="No Handphone">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Email : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="email" value="{{ $find->email }}" id="example-text-input" placeholder="Email">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Alamat Domisili : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="alamat_domisili" value="{{ $find->alamat_domisili }}" id="example-text-input" placeholder="Alamat Domisili">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Poliklinik : </label>
                        <div class="col-md-4">
                            <select name="poliklinik_id" id="userSelectCategory" class="form-select" aria-label="Floating label select">
                                @foreach ($res_layanan_polikliniks as $item)
                                @if ($find->poliklinik_id == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->poliklinik}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->poliklinik}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Riwayat Dokter : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="riwayat" value="{{ $find->riwayat }}" id="example-text-input" placeholder="Riwayat Dokter">
                        </div>
                    </div>
                </form>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('dokter.list') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
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