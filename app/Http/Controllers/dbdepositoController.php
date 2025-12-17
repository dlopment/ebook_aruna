<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dbdeposito;

class dbdepositoController extends Controller
{
    public function index()
    {
        $data = dbdeposito::all();
        return view('admin.dbdeposito.index', compact('data'));
    }
    public function create()
    {
        return view('admin.dbdeposito.cerate');
    }
    public function store(Request $request)
    {
        $namaFileGambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFileGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_produk'), $namaFileGambar); // simpan ke public/gambar_produk
        }
        $data = dbdeposito::create([
            'nama_produk' => $request->nama_produk,
            'gambar' => $namaFileGambar,
            'desprod' => $request->desprod,
            'sk_bunga' => $request->sk_bunga,
            'setawmin' => $request->setawmin,
            'setselmin' => $request->setselmin,
            'salpeng' => $request->salpeng,
            'jang_wkt' => $request->jang_wkt,
            'kel' => $request->kel,
        ]);
        return redirect()->route('admdeposito.index')->with('success', 'Inventory added successfully.');
    }

    public function edit($id, Request $request)
    {
        $data = dbdeposito::find($id);
        return view('admin.dbdeposito.update', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = dbdeposito::findOrFail($id);

        // Simpan nama file lama
        $gambarLama = $data->gambar;

        // Cek apakah user mengupload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus file lama kalau ada
            if ($gambarLama && file_exists(public_path('gambar_produk/' . $gambarLama))) {
                unlink(public_path('gambar_produk/' . $gambarLama));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $namaFileGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_produk'), $namaFileGambar);
        } else {
            // Tetap pakai gambar lama
            $namaFileGambar = $gambarLama;
        }

        // Update data
        $data->update([
            'nama_produk' => $request->nama_produk,
            'gambar' => $namaFileGambar,
            'desprod' => $request->desprod,
            'sk_bunga' => $request->sk_bunga,
            'setawmin' => $request->setawmin,
            'setselmin' => $request->setselmin,
            'salpeng' => $request->salpeng,
            'jang_wkt' => $request->jang_wkt,
            'kel' => $request->kel,
        ]);
        return redirect()->route('admdeposito.index')->with('success', 'Kategori berhasil diperbarui.');
    }


    public function destroy($id, Request $request)
    {
        $produk = dbdeposito::findOrFail($id);

        // Hapus file gambar dari folder
        if ($produk->gambar && file_exists(public_path('gambar_produk/' . $produk->gambar))) {
            unlink(public_path('gambar_produk/' . $produk->gambar));
        }

        // Hapus data dari database
        $produk->delete();

        return redirect()->route('admdeposito.index')->with('success', 'Produk berhasil dihapus.');
    }
}
