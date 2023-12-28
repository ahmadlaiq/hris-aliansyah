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
                        DATA USER
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
                            Tambah User
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
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Password</th>
                                    <th>Jabatan</th>
                                    <th>Role</th>
                                    <th class="w-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td data-label="Name">
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2"
                                                    style="background-image: url(./assets/static/avatars/010m.jpg)"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $user->name }}</div>
                                                    <div class="text-muted"><a href="#"
                                                            class="text-reset">{{ $user->email }}</a></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-muted" data-label="Role">
                                            ******
                                        </td>
                                        <td data-label="Title">
                                            <div>VP Sales</div>
                                            <div class="text-muted">Business Development</div>
                                        </td>
                                        <td class="text-muted" data-label="Role">
                                            {{ $user->role }}
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-primary dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit-{{ $user->id }}">Edit</button>
                                                        <a href="javascript:void(0)" id="btn-delete-post"
                                                            data-id="{{ $user->id }}"
                                                            class="dropdown-item text-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @include('managements.users.edit')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex mt-3 justify-content-end">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('managements.users.create')
@endsection

@include('managements.users.delete')
