@extends('admin.layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('minible/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


<h4 class="mb-0">List Dokter</h4>
<div class="row">
    <div class="col-12">
        <div class="card">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success" href="{{ route('dokter.create') }}">Create Dokter</a>
                    <a class="btn btn-success" href="{{ route('jadwal_dokter.create') }}">Create Jadwal Dokter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Handphone</th>
                                    <th>E-Mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($res_dokter as $item)
                                <tr>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td><img src="{{ asset('storage/dokter-image/'.$item->slug. '/' .$item->image) }}" alt="" width="200"></td>
                                    <td>{{ $item->nama}}</td>
                                    <td>{{ $item->jenis_kelamin}}</td>
                                    <td>{{ $item->no_hp}}</td>
                                    <td>{{ $item->email}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('jadwal_dokter.list',$item->id) }}"><i class="bi bi-calendar-plus"></a>
                                        <a class="btn btn-info" href="{{ route('dokter.show',$item->id) }}"><i class="uil uil-eye"></i></a>
                                        <a href="{{ route('dokter.edit',$item->id) }}" class="btn btn-xs btn-info"><i class="uil-pen"></i></a>
                                        <a href="{{ route('dokter.destroy',$item->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                        </form>
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
    <script src="{{ URL::asset('minible/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('minible/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('minible/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('minible/assets/js/pages/datatables.init.js') }}"></script>
    @endsection