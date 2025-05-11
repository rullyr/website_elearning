@extends('admin.layouts.app')

@section('title', 'Edit Data Kelas ' . $kelas->class_name)
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
                        <h1>Edit {{ $kelas->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Data Kelas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Data Kelas</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.kelas.update', $kelas->id) }}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="class_name">Masukkan Nama Kelas</label>
                                        <input type="text" class="form-control" id="class_name" name="class_name"
                                            value="{{ old('class_name') ?? $kelas->name }}"
                                            placeholder="Masukkan Nama Kelas">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Pilih Status</label>
                                        <select class="form-control" id="status" name="status">
                                            @foreach (['aktif', 'non-aktif'] as $label)
                                                <option value="{{ $label }}"
                                                    {{ $kelas->status == $label ? 'selected' : '' }}>{{ ucwords($label) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
