<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('admin.pages.quiz.create', [
            'type_menu' => 'quiz-create',
            'class' => $kelas,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $classId)
    {
        $kelas = Kelas::findOrFail($classId);

        $validated = $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            'correct_answer' => 'required|in:A,B,C,D,E',
        ]);

        $quiz = new Quiz([
            'class_id' => $kelas->id,
            'question' => $validated['question'],
            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'],
            'option_e' => $validated['option_e'],
            'correct_answer' => $validated['correct_answer'],
        ]);

        $quiz->save();

        return redirect()->route('admin.kelas.show', $kelas->id)
            ->with('success', "Quiz untuk kelas {$kelas->name} berhasil ditambahkan.");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    public function edit(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('admin.pages.quiz.edit', [
            'quiz' => $quiz,
            'class' => $quiz->kelas,
            'type_menu' => 'quiz-create',
        ]);
    }

    public function update(Request $request, string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            'correct_answer' => 'required|in:A,B,C,D,E',
        ]);

        $quiz->update([
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'option_e' => $request->option_e,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()->route('admin.kelas.show', $quiz->class_id)
            ->with('success', "Quis berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('admin.kelas.show', $quiz->class_id)
            ->with('success', "Quis berhasil dihapus");
    }
}
