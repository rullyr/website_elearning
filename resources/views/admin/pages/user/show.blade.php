@extends('admin.layouts.app')

@section('title', 'Data Kursus')

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
                        <h1>Detail Kursus <b>{{ $class->name }}</b></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Kursus</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Info Kursus box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Info Kursus</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Jumlah Materi</span>
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{ $materials->count() }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Jumlah Quiz</span>
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{ $quizzes->count() }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Jumlah Skor</span>
                                            <span class="info-box-number text-center text-muted mb-0">10</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <!-- Info Materi box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Materi</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="table-materials" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Materi</th>
                                <th>Source</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($materials as $material)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $material->title }}</td>
                                    <td><a href="{{ $material->source }}">Lihat</a></td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="../examples/materi_edit.html">
                                            <i class="fas fa-pencil-alt"> </i>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.user.delete', $user->id) }}"
                                            class="d-inline">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-sm" title='Delete'
                                                onclick="return confirm('Data ini akan di hapus, anda yakin?')">
                                                <i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Data Belum Ada</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Materi</th>
                                <th>Source</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Info Quis box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quiz</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Quiz</th>
                                <th>Opsi 1</th>
                                <th>Opsi 2</th>
                                <th>Opsi 3</th>
                                <th>Opsi 4</th>
                                <th>Opsi 5</th>
                                <th>Jawaban</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($quizzes as $quis)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $quis->question }}</td>
                                    <td>{{ $quis->option_a }}</td>
                                    <td>{{ $quis->option_b }}</td>
                                    <td>{{ $quis->option_c }}</td>
                                    <td>{{ $quis->option_d }}</td>
                                    <td>{{ $quis->option_e }}</td>
                                    <td>{{ $quis->correct_answer }}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm mb-2" href="../examples/materi_edit.html">
                                            <i class="fas fa-pencil-alt"> </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm mb-2" href="#">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">Data Belum Ada</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Quiz</th>
                                <th>Opsi 1</th>
                                <th>Opsi 2</th>
                                <th>Opsi 3</th>
                                <th>Opsi 4</th>
                                <th>Opsi 5</th>
                                <th>Jawaban</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
