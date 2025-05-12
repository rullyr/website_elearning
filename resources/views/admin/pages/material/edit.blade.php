@extends('admin.layouts.app')
@section('title', 'Edit Materi')

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
                        <h1>Form Edit Materi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Edit Materi</li>
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
                                <h3 class="card-title">Form Edit Materi</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.material.update', $material->id) }}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Kode Materi</label>
                                        <input type="text" disabled class="form-control" value="{{ $material->id }}"
                                            placeholder="Masukkan Judul Materi">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Masukkan Judul Materi</label>
                                        <input type="text" class="form-control" id="title" name='title'
                                            value="{{ $material->title }}" placeholder="Masukkan Judul Materi">
                                    </div>
                                    <div class="form-group">
                                        <label for="source">Source</label>
                                        <input type="text" class="form-control" id="source" name='source'
                                            value="{{ $material->source }}" placeholder="Masukkan Sumber Materi">
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
