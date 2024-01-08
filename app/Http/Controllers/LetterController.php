<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = Letter::orderBy('id', 'desc')->paginate(25);
        // $categories = Categories::get(['id', 'name']);
        return view('letters.index', compact('letters'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'image' => 'required|file|mimes:pdf,doc,jpg,png,jpeg|max:5000' // Ubah validasi menjadi file dengan ekstensi yang diizinkan
    ]);
    $content = $request->input('description') ?: '';

    if (empty($content)) {
        $content = 'Surat ' . ucwords($request->title);
    }
    
    $letters = new Letter();
    $letters->title = ucwords($request->title);
    $letters->user_id = Auth::user()->id;
    // $letters->categori_id = $request->categori_id;
    $letters->description = $content;

    // Simpan file ke direktori yang sesuai
    $filePath = $request->file('image')->store('letter-images');

    $letters->image = $filePath;
    $letters->save();

    return redirect()
        ->route('letters.index')
        ->with('success', 'Surat demosi berhasil dibuat!');
}

    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $letters = Letter::where(function ($query) use ($searchTerm) {
            $query->where('title', 'like', '%' . $searchTerm . '%');
        })
            ->paginate(25);
            $letters->appends(['search' => $searchTerm]);
    
        return view('letters.index', compact('letters'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'categori_id' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $letters = Letter::findOrFail($id);
        $letters->title = ucwords($request->title);
        $letters->user_id = Auth::user()->id;
        $letters->categori_id = $request->categori_id;
        $letters->description = ucwords($request->description);

        if ($request->file('image')) {
            if ($letters->image && file_exists(storage_path('app/public/' . $letters->image))) {
                Storage::delete('public/' . $letters->image);
            }
            $file = $request->file('image')->store('letter-images');
            $letters->image = $file;
        }

        $letters->save();

        return redirect()
            ->route('letters.index')
            ->with('success', 'Surat demosi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $letters = Letter::findOrFail($id);
        $letters->delete();

        if ($letters->image && file_exists(storage_path('app/public/' . $letters->image))) {
            Storage::delete('public/' . $letters->image);
        }

        // Return response
        return response()->json([
            'success' => true,
            'message' => 'Surat demosi berhasil dihapus!',
        ]);
    }
}
