@extends('layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <x-alert />
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        HRIS MANAJEMEN
                    </div>
                    <h2 class="page-title">
                        DATA SURAT PEMBERITAHUAN
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Tambah Surat
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter table-mobile-md card-table">
                            <thead>
                                <tr class="text-bold">
                                    <th>No</th>
                                    <th>Judul Surat</th>
                                    <th>Deskripsi</th>
                                    <th class="w-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($letters as $letter)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td data-label="Name">
                                            <div class="d-flex py-1 align-items-center">
                                                <div class="flex-fill">
                                                    @if(in_array(pathinfo($letter->image, PATHINFO_EXTENSION), ['pdf', 'doc']))
                                                        <a href="{{ Storage::url($letter->image) }}" target="_blank">Download Dokumen</a>
                                                    @elseif(in_array(pathinfo($letter->image, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                        <img src="{{ asset('storage/'.$letter->image)}}" alt="Gambar" height="100">
                                                    @else
                                                        Tidak ada file yang valid
                                                    @endif
                                                </div>
                                            </div>
                                        </td>                                         --}}
                                        <td data-label="Name">
                                            <div class="d-flex py-1 align-items-center">
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $letter->title }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Kategori">
                                            <div class="d-flex py-1 align-items-center">
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $letter->description }}</div>
                                                </div>
                                            </div>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-success dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#modal-detail-{{ $letter->id }}">Detail</button>
                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit-{{ $letter->id }}">Edit</button>
                                                        <a href="javascript:void(0)" id="btn-delete-post"
                                                            data-id="{{ $letter->id }}"
                                                            class="dropdown-item text-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @include('letters-pemberitahuan.edit')
                                        @include('letters-pemberitahuan.show')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex mt-3 justify-content-end">
                        {{ $letters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('letters-pemberitahuan.create')
@endsection

@include('letters-pemberitahuan.delete')
