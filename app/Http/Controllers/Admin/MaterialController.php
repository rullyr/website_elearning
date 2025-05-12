<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;

class MaterialController extends Controller
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

        if ($kelas->is_tryout) {
            abort(404);
        }

        return view('admin.pages.material.create', [
            'type_menu' => 'material-create',
            'class' => $kelas,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        // Ambil data kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);

        if ($kelas->is_tryout == 1) {
            abort(405);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'source' => 'required|url',
        ]);

        $kelas->materials()->create([
            'title' => $validated['title'],
            'source' => $validated['source'],
        ]);

        return redirect()
            ->route('admin.kelas.show', $kelas->id)
            ->with('success', 'Materi untuk kelas ' . $kelas->name . ' berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = Material::findOrFail($id);

        return view('admin.pages.material.edit', [
            'type_menu' => 'material-edit',
            'material' => $material
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'source' => 'sometimes|url',
        ]);
        $material = Material::findOrFail($id);
        $material->update([
            'title' => $validated['title'] ?? $material->title,
            'source' => $validated['source'] ?? $material->source,
        ]);

        return redirect()->route('admin.kelas.show', $material->class_id)
            ->with('success', "Materi berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('admin.kelas.show', $material->class_id)
            ->with('success', "Materi berhasil dihapus");
    }
}
