<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    /**
     * Menampilkan semua data publikasi
     */
    public function index(Request $request)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        return Publikasi::all();
    }

    /**
     * Menyimpan data publikasi baru
     */
    public function store(Request $request)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'description' => 'nullable|string',
            'coverUrl' => 'nullable|url',
        ]);

        $publikasi = Publikasi::create($validated);

        return response()->json($publikasi, 201);
    }

    /**
     * Menampilkan detail publikasi berdasarkan ID
     */
    public function show(Request $request, $id)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $publikasi = Publikasi::find($id);

        if (!$publikasi) {
            return response()->json(['message' => 'Publikasi tidak ditemukan'], 404);
        }

        return response()->json($publikasi);
    }

    /**
     * Mengupdate data publikasi berdasarkan ID
     */
    public function update(Request $request, $id)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $publikasi = Publikasi::find($id);

        if (!$publikasi) {
            return response()->json(['message' => 'Publikasi tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'description' => 'nullable|string',
            'coverUrl' => 'nullable|url',
        ]);

        $publikasi->update($validated);

        return response()->json($publikasi);
    }

    /**
     * Menghapus data publikasi berdasarkan ID
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $publikasi = Publikasi::find($id);

        if (!$publikasi) {
            return response()->json(['message' => 'Publikasi tidak ditemukan'], 404);
        }

        $publikasi->delete();

        return response()->json(['message' => 'Publikasi berhasil dihapus']);
    }
}
