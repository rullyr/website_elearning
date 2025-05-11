<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kelas;
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
        return view('admin.pages.user.show', ['type_menu' => 'class-list']);
    }

    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')
            ->with('success', "Data user {$user->name} berhasil dihapus");
    }
}
