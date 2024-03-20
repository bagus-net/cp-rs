@extends('admin.layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('minible/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


<h4 class="mb-0">List Fasilitas Layanan</h4>
<div class="row">
    <div class="col-12">
        <div class="card">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success" href="{{ route('fasilitas_layanan.create') }}">Create Fasilitas Layanan</a>
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
                                    <th>Nama Fasilitas</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($res_fasilitas_layanan as $item)
                                <tr>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td><img src="{{ asset('storage/fasilitas_layanan-image/'.$item->slug. '/' .$item->image) }}" alt="" width="200"></td>
                                    <td>{{ $item->nama_fasilitas}}</td>
                                    <td>{{ $item->kategori}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('fasilitas_layanan.show',$item->id) }}"><i class="uil uil-eye"></i></a>
                                        <a href="{{ route('fasilitas_layanan.edit',$item->id) }}" class="btn btn-xs btn-info"><i class="uil-pen"></i></a>
                                        <a href="{{ route('fasilitas_layanan.destroy',$item->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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