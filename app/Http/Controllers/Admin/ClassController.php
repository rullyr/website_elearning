<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Kelas::with(['users', 'materials', 'quizzes'])->get();
        return view('admin.pages.class.index', ['type_menu' => 'class-list', 'classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.class.create', ['type_menu' => 'class-create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string',
            'is_tryout' => 'sometimes|nullable|in:true',
        ]);

        $kelas = Kelas::create(
            [
                'name' => $request->input('class_name'),
                'status' => 'aktif',
                'is_tryout' => $request->input('is_tryout') == true ? true : false
            ]
        );

        return redirect()->route('admin.kelas.index')
            ->with('success', "Data kelas {$kelas->name} berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::with(['users', 'materials', 'quizzes'])->findOrFail($id);
        $materials = $kelas->materials;
        $quizzes = $kelas->quizzes;
        return view('admin.pages.class.show', ['type_menu' => 'class-list', 'class' => $kelas, 'materials' => $materials, 'quizzes' => $quizzes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('admin.pages.class.edit', [
            'type_menu' => 'class-edit',
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'class_name' => 'sometimes|required|string',
            'status' => 'sometimes|required|in:aktif,non-aktif',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'name' => $request->input('class_name'),
            'status' =>  $request->input('status'),
            'is_tryout' => $request->input('is_tryout') == true ? true : false
        ]);

        return redirect()->route('admin.kelas.index')
            ->with('success', "Data kelas {$kelas->name} berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
