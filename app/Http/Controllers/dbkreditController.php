<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dbkredit;

class dbkreditController extends Controller
{
    public function index()
    {
        $deposito = dbkredit::all();
        return view('admin.dbkredit.index', compact('deposito'));
    }
    public function create()
    {
        return view('admin.dbkredit.cerate');
    }
    public function store(Request $request)
    {
        $namaFileGambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFileGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_kredit'), $namaFileGambar); // simpan ke public/gambar_produk
        }
        $data = dbkredit::create([
            'nama_produk' => $request->nama_produk,
            'gambar' => $namaFileGambar,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,
        ]);
        return redirect()->route('admkredit.index')->with('success', 'Inventory added successfully.');
    }

    public function edit($id, Request $request)
    {
        $data = dbkredit::find($id);
        return view('admin.dbkredit.update', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $produk = dbkredit::findOrFail($id);

        // Simpan nama file lama
        $gambarLama = $produk->gambar;

        // Cek apakah user mengupload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus file lama kalau ada
            if ($gambarLama && file_exists(public_path('gambar_kredit/' . $gambarLama))) {
                unlink(public_path('gambar_kredit/' . $gambarLama));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $namaFileGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_kredit'), $namaFileGambar);
        } else {
            // Tetap pakai gambar lama
            $namaFileGambar = $gambarLama;
        }

        // Cari data berdasarkan id_ktg
        $data = dbkredit::findOrFail($id);
        // Update data
        $data->update([
            'nama_produk' => $request->nama_produk,
            'gambar' => $namaFileGambar,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,
        ]);
        return redirect()->route('admkredit.index')->with('success', 'Kategori berhasil diperbarui.');
    }


    public function destroy($id, Request $request)
    {
        $produk = dbkredit::findOrFail($id);

        // Hapus file gambar dari folder
        if ($produk->gambar && file_exists(public_path('gambar_kredit/' . $produk->gambar))) {
            unlink(public_path('gambar_kredit/' . $produk->gambar));
        }

        // Hapus data dari database
        $produk->delete();

        return redirect()->route('admkredit.index')->with('success', 'Produk berhasil dihapus.');
    }
}
