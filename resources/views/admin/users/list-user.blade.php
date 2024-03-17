@extends('layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Tables @endslot
@slot('title') List User @endslot
@endcomponent

@if (Auth::user()->level == '1')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success" href="{{ route('user.create') }}"> Create User</a>

            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($res_user as $item)
                            <tr>
                                <td>{{ $loop->index + 1}}</td>
                                <td>{{ $item->nama}}</td>
                                <td>{{ $item->role}}</td>
                                <td>
                                    @if (Auth::user()->level == '1')
                                    <a class="btn btn-primary" href="{{ route('user.edit',$item->id) }}"><i class="uil uil-pen font-size-18"></i></a>
                                    <a class="btn btn-danger" href="{{ route('user.destroy',$item->id) }}"><i class="uil uil-trash-alt font-size-18"></i></a>
                                    @endif
                                    @csrf
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection