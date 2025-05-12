@extends('admin.layouts.app')
@section('title', 'Tambah Quiz')

@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/codemirror/theme/monokai.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/simplemde/simplemde.min.css') }}">
@endpush
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Buat Quiz</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Buat Quiz</li>
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
                                <h3 class="card-title">Form Quiz Baru</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.quiz.store', $class->id) }}">
                                @csrf
                                <br>
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Masukkan Soal</h3>
                                        </div>
                                        <div class="card-body">
                                            <textarea id="summernote" name="question" class="form-control">{!! old('question') !!}</textarea>
                                            @error('question')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    @foreach (['a', 'b', 'c', 'd', 'e'] as $opt)
                                        <div class="form-group">
                                            <label for="option_{{ $opt }}">Opsi {{ strtoupper($opt) }}</label>
                                            <input type="text" class="form-control" name="option_{{ $opt }}"
                                                id="option_{{ $opt }}" placeholder="Opsi {{ strtoupper($opt) }}"
                                                value="{{ old('option_' . $opt) }}">
                                            @error('option_' . $opt)
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    @endforeach

                                    <div class="form-group">
                                        <label>Jawaban Yang Benar</label>
                                        <select class="form-control" name="correct_answer">
                                            <option value="">-- Pilih jawaban benar --</option>
                                            <option value="A" {{ old('correct_answer') === 'A' ? 'selected' : '' }}>
                                                Opsi A
                                            </option>
                                            <option value="B" {{ old('correct_answer') === 'B' ? 'selected' : '' }}>
                                                Opsi B
                                            </option>
                                            <option value="C" {{ old('correct_answer') === 'C' ? 'selected' : '' }}>
                                                Opsi C
                                            </option>
                                            <option value="D" {{ old('correct_answer') === 'D' ? 'selected' : '' }}>
                                                Opsi D
                                            </option>
                                            <option value="E" {{ old('correct_answer') === 'E' ? 'selected' : '' }}>
                                                Opsi E
                                            </option>
                                        </select>
                                        @error('correct_answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

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

@push('scripts')
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ asset('assets/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endpush
