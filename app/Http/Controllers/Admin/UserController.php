<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kelas;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->user()->get();
        return view('admin.pages.user.index', ['type_menu' => 'user-list', 'users' => $users]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $allKelas = Kelas::with('quizzes')->active()->get();

        $scores = [];

        foreach ($allKelas as $kelas) {
            $quizIds = $kelas->quizzes->pluck('id');
            $score = QuizAnswer::where('user_id', $user->id)
                ->whereIn('quiz_id', $quizIds)
                ->where('is_correct', true)
                ->count();

            $scores[] = [
                'name' => $kelas->name,
                'is_tryout' => $kelas->is_tryout,
                'score' => $score * ($kelas->is_tryout == 1 ? 5 : 1),
            ];
        }

        return view('admin.pages.user.show', [
            'type_menu' => 'class-list',
            'user' => $user,
            'scores' => $scores,
        ]);
    }

    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')
            ->with('success', "Data user {$user->name} berhasil dihapus");
    }
}
