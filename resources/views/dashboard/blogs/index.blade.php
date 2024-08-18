@extends('dashboard.main')
@section('container.dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    <hr class="divider my-0">
</div>

<a href="javascript:void(0)" class="btn btn-primary mb-2" id="btn-create-blog"><i class="bi bi-plus-circle-fill"></i>
    Tambah
    Blog
</a>

<x-atoms.select id="category-filter">
    <option value="">All Category</option>
    @foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</x-atoms.select>

<a href="javascript:void(0)" class="btn btn-danger d-block-inline justify-content-end mb-2" id="btn-recycle-blog">
    <i class="bi bi-trash-fill"></i>
    Recycle bin
</a>

<a href="javascript:void(0)" class="btn btn-light d-block-inline justify-content-end mb-2" id="btn-log-blog">
    <i class="bi bi-clock-history"></i>
    Log
</a>

<table class="table table-bordered table-striped d-block" id="table" width="100%">
    <thead>
        <tr>
            <th width='20%'>Title</th>
            <th width='40%'>Content</th>
            <th width='20%'>Category</th>
            <th width='40%'>Aksi</th>
        </tr>
    </thead>
</table>

<table class="table table-bordered table-striped d-none" id="table-log" width="100%">
    <thead>
        <tr>
            <th width='40%'>Description</th>
            <th width='60%'>Time</th>
        </tr>
    </thead>
    <tbody>
        <tr class=""></tr>
    </tbody>
</table>


<input type="hidden" id="log-url" value="{{ route('log') }}">
<input type="hidden" id="table-url" value="{{ route('table') }}">
<input type="hidden" id="recycle-url" value="{{ route('recycle') }}">

<x-organisms.modal-edit :categories="$categories" />
<x-organisms.modal-create :categories="$categories" />
<x-organisms.modal-show />
<x-organisms.delete />

@push('scripts')
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="{{ asset('js/dashboard/toastify.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.1.2/datatables.min.js"></script>
<script src="{{ asset('js/dashboard/dataTable.js') }}"></script>
<script src="{{ asset('js/components/restore.js') }}"></script>
<script src="{{ asset('js/components/destroy.js') }}"></script>
<script src="{{ asset('js/components/log.js') }}"></script>
@endpush

@push('style')
<link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}">
<link href="https://cdn.datatables.net/v/bs5/dt-2.1.2/datatables.min.css" rel="stylesheet">
@endpush
@endsection