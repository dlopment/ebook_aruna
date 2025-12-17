<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dbtabungan;

class dbtabunganController extends Controller
{
    public function index()
    {
        $tabungan = dbtabungan::all();
        return view('admin.dbtabungan.index', compact('tabungan'));
    }
    public function create()
    {
        return view('admin.dbtabungan.cerate');
    }
    public function store(Request $request)
    {
        $namaFileGambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFileGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_tabungan'), $namaFileGambar); // simpan ke public/gambar_produk
        }
        $data = dbtabungan::create([
            'nama' => $request->nama,
            'gambar' => $namaFileGambar,
            'desprod' => $request->desprod,
            'peruntukan' => $request->peruntukan,
            'suku_bng' => $request->suku_bng,
            'setmin' => $request->setmin,
            'setblnmin' => $request->setblnmin,
            'salselmin' => $request->salselmin,
            'setpengmin' => $request->setpengmin,
            'jnkwkt' => $request->jnkwkt,
            'perket' => $request->perket,
        ]);
        return redirect()->route('admtabungan.index')->with('success', 'Inventory added successfully.');
    }

    public function edit($id, Request $request)
    {
        $data = dbtabungan::find($id);
        return view('admin.dbtabungan.update', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = dbtabungan::findOrFail($id);

        // Simpan nama file lama
        $gambarLama = $data->gambar;

        // Cek apakah user mengupload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus file lama kalau ada
            if ($gambarLama && file_exists(public_path('gambar_tabungan/' . $gambarLama))) {
                unlink(public_path('gambar_tabungan/' . $gambarLama));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $namaFileGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_tabungan'), $namaFileGambar);
        } else {
            // Tetap pakai gambar lama
            $namaFileGambar = $gambarLama;
        }

        // Update data
        $data->update([
            'nama' => $request->nama,
            'gambar' => $namaFileGambar,
            'desprod' => $request->desprod,
            'suku_bng' => $request->suku_bng,
            'setmin' => $request->setmin,
            'setblnmin' => $request->setblnmin,
            'salselmin' => $request->salselmin,
            'setpengmin' => $request->setpengmin,
            'jnkwkt' => $request->jnkwkt,
            'perket' => $request->perket,
        ]);
        return redirect()->route('admtabungan.index')->with('success', 'Kategori berhasil diperbarui.');
    }


    public function destroy($id, Request $request)
    {
        $produk = dbtabungan::findOrFail($id);

        // Hapus file gambar dari folder
        if ($produk->gambar && file_exists(public_path('gambar_tabungan/' . $produk->gambar))) {
            unlink(public_path('gambar_tabungan/' . $produk->gambar));
        }

        // Hapus data dari database
        $produk->delete();

        return redirect()->route('admtabungan.index')->with('success', 'Produk berhasil dihapus.');
    }
}
