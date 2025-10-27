@extends('layouts.admin')

@section('title', 'News Management')

@section('page-heading')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">News Management</h1>
    <a href="{{ route('news.create') }}"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Create News
    </a>
</div>
@endsection

@section('content')
<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table of News List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Links</th>
                                <th>Desc</th>
                                <th>Media</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($news as $item)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->judul }}</div>
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit($item->excerpt, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->link }}</div>
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit($item->link, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->desc }}</div>
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit($item->desc, 50) }}</div>
                                    </td>
                                    <td>
                                        @if($item->media)
                                            <img src="{{ asset('storage/' . $item->media) }}"
                                                alt="{{ $item->judul }}"
                                                class="img-thumbnail"
                                                style="height:60px; width:auto; cursor:pointer;"
                                                data-bs-toggle="modal"
                                                data-bs-target="#imageModal-{{ $item->id }}">
                                            <!-- Modal Bootstrap -->
                                            <div class="modal fade" id="imageModal-{{ $item->id }}" tabindex="-1" aria-labelledby="label-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="label-{{ $item->id }}">{{ $item->judul }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('storage/' . $item->media) }}" alt="{{ $item->judul }}" class="img-fluid rounded">
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        @else
                                            <div class="h-12 w-12 bg-gray-200 rounded flex items-center justify-center">
                                                <span class="text-gray-400 text-xs">No image</span>
                                            </div>
                                        @endif
                                    </td>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('news.edit', $item) }}"
                                            class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                        <form action="{{ route('news.destroy', $item) }}"
                                            method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No news found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endpush
