@extends('admin.layouts.app')
@section('title', 'Detail User')

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
                        <h1>Detail User <strong>{{ $user->name }}</strong></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Nilai Kelas</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                            <div class="row">
                                @foreach ($scores as $data)
                                    <div class="col-md-3">
                                        <div class="card text-center p-3">
                                            <h5>
                                                {{ $data['name'] }}
                                                <small class="d-block text-muted" style="font-size: 12px;">
                                                    {{ $data['is_tryout'] ? 'Tryout' : 'Kelas' }}
                                                </small>
                                            </h5>
                                            <h3>{{ $data['score'] }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
