<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\dbpromo;

class dbpromoController extends Controller
{

    // Menampilkan semua data
    public function index()
    {
        $data = dbpromo::all();
        return view('admin.promo.index', compact('data'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('admin.promo.cerate');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $namaFileGambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFileGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_promo'), $namaFileGambar); // simpan ke public/gambar_produk
        }
        dbpromo::create([
            'nama_promo' => $request->nama_promo,
            'gambar' => $namaFileGambar,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('promo.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data = dbpromo::findOrFail($id);
        return view('admin.promo.update', compact('data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $data = dbpromo::findOrFail($id);
        // Simpan nama file lama
        $gambarLama = $data->gambar;

        // Cek apakah user mengupload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus file lama kalau ada
            if ($gambarLama && file_exists(public_path('gambar_promo/' . $gambarLama))) {
                unlink(public_path('gambar_promo/' . $gambarLama));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $namaFileGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_promo'), $namaFileGambar);
        } else {
            // Tetap pakai gambar lama
            $namaFileGambar = $gambarLama;
        }
        $data->update([
            'nama_promo' => $request->nama_promo,
            'gambar' => $namaFileGambar,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('promo.index')->with('success', 'Produk berhasil diperbarui');
    }

    // Hapus data
    public function destroy($id)
    {
        $data = dbpromo::findOrFail($id);
        $data->delete();

        return redirect()->route('promo.index')->with('success', 'Produk berhasil dihapus');
    }
}
