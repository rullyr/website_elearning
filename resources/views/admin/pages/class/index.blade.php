@extends('admin.layouts.app')

@section('title', 'Dashboard')

@push('style')
@endpush
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Kelas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Kelas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <x-alert type="success" :message="session('success')" />
                @endif

                @error('error')
                    <x-alert type="danger" :message="$message" />
                @enderror


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Kelas</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($classes as $class)
                                            <tr>
                                                <td>{{ $class->name }}</td>
                                                <td>{{ $class->status_label }}</td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-primary btn-sm" href="../examples/kelas_detail.html">
                                                        <i class="fa fa-info-circle"></i>
                                                        Info
                                                    </a>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('admin.kelas.edit', $class->id) }}">
                                                        <i class="fas fa-pencil-alt"> </i>
                                                        Edit
                                                    </a>
                                                    {{-- <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">Data tidak ditemukan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
