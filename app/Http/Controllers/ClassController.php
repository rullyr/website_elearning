<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Kelas;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $kelas = Kelas::with(['users', 'materials', 'quizzes'])->active()->findOrFail($id);
        $materials = $kelas->materials;
        $quizzes = $kelas->quizzes;
        $userId = Auth::user()->id; // default untuk testing, nanti ganti dengan login

        // Ambil jawaban user untuk kelas ini
        $answeredQuizIds = QuizAnswer::where('user_id', $userId)
            ->whereIn('quiz_id', $quizzes->pluck('id'))
            ->pluck('quiz_id')
            ->toArray();

        // Jika user sudah mengisi semua quiz, hitung skor
        $score = null;
        $total = $quizzes->count();

        if (!empty($answeredQuizIds)) {
            $score = QuizAnswer::where('user_id', $userId)
                ->whereIn('quiz_id', $quizzes->pluck('id'))
                ->where('is_correct', true)
                ->count();
        }

        return view('class', [
            'type_menu' => 'class-list',
            'classes' => $kelas,
            'materials' => $materials,
            'quizzes' => $quizzes,
            'correct_answer' => $score,
            'score' => $score * $kelas->scoreValue,
            'total' => $total,
            'haveQuiz' => !empty($answeredQuizIds)
        ]);
    }



    public function submit(Request $request, string $id)
    {
        $user = Auth::user(); // pastikan user sudah login
        $quizzes = Quiz::where('class_id', $id)->get();
        $data = $request->input('quiz');

        $score = 0;

        foreach ($quizzes as $index => $quiz) {
            $answerKey = $data[$index] ?? null;

            $isCorrect = strtolower($quiz->correct_answer) === strtolower($answerKey);

            // Simpan ke tabel quiz_answers
            QuizAnswer::updateOrCreate([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id
            ], [
                'selected_answer' => $answerKey,
                'is_correct' => $isCorrect,
            ]);

            if ($isCorrect) $score++;
        }

        return redirect()->route('kelas.index', $id);
    }
}
