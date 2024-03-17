@extends('layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Tables @endslot
@slot('title') Add Role @endslot
@endcomponent



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
        <form action="{{ route('role.add') }}" method="POST" id="myForm">
          @csrf
          <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Role : </label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="role" value="{{ old('role') }}" id="example-text-input" placeholder="Nama Role">
            </div>
          </div>
          <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('role.list') }}"> Back</a>
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
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script>
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