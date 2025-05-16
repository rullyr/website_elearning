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
                        <h1>Detail Kursus <b>{{ $class->name }}</b>
                            @if ($class->is_tryout == true)
                                <span class="badge ba badge-warning">
                                    Try Out</span>
                            @else
                                <span class="badge badge-success">
                                    Kelas</span>
                            @endif
                        </h1>
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
            @if (session()->has('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            @error('error')
                <x-alert type="danger" :message="$message" />
            @enderror

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
                                            <span class="info-box-number text-center text-muted mb-0">
                                                @if ($class->is_tryout == true)
                                                    5
                                                @else
                                                    1
                                                @endif
                                            </span>
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
                                    <td class="project-actions text-left">
                                        <a class="btn btn-info btn-sm mb-2"
                                            href="{{ route('admin.material.edit', $material->id) }}">
                                            <i class="fas fa-pencil-alt"> </i>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.material.delete', $material->id) }}"
                                            class="d-inline">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-sm mb-2" title='Delete'
                                                onclick="return confirm('Data ini akan di hapus, anda yakin?')">
                                                <i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data Belum Ada</td>
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
                                <th>Pertanyaan</th>
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
                            @forelse ($quizzes as $quiz)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $quiz->question }}</td>
                                    <td>{{ $quiz->option_a }}</td>
                                    <td>{{ $quiz->option_b }}</td>
                                    <td>{{ $quiz->option_c }}</td>
                                    <td>{{ $quiz->option_d }}</td>
                                    <td>{{ $quiz->option_e }}</td>
                                    <td>{{ Str::upper($quiz->correct_answer) }}</td>
                                    <td class="project-actions text-left">
                                        <a class="btn btn-info btn-sm mb-2"
                                            href="{{ route('admin.quiz.edit', $quiz->id) }}">
                                            <i class="fas fa-pencil-alt"> </i>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.quiz.delete', $quiz->id) }}"
                                            class="d-inline">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-sm mb-2" title='Delete'
                                                onclick="return confirm('Data ini akan di hapus, anda yakin?')">
                                                <i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Data Belum Ada</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
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
