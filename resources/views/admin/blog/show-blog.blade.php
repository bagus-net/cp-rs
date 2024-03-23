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
            <h2>Show Blog</h2>
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
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Slug : </label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="slug" value="{{ $find->slug }}" id="example-text-input" placeholder="Slug" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Title : </label>
                    <div class="col-md-10">
                        <input type="text" name="title" value="{{ $find->title }}" class="form-control" placeholder="Title" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Category : </label>
                    <div class="col-md-10">
                        <select name="category_id" id="userSelectCategory" class="form-select" aria-label="Floating label select" disabled>
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
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Content:</label>
                    <div class="col-md-10">
                        <div id="classic-editor">
                            {!! $find->body !!}
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('blog.list') }}"> Back</a>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection

@section('script')
<!-- Your scripts if any -->
@endsection
