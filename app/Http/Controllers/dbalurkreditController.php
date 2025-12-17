<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dbalur;
use App\Models\dbkredit;

class dbalurkreditController extends Controller
{
    public function index()
    {
        $dbalur = dbalur::with('alurkredit')->get();
        return view('admin.dbtalur_kredit.index', compact('dbalur'));
    }

    public function create()
    {
        $dbalur = dbkredit::all();
        return view('admin.dbtalur_kredit.cerate', compact('dbalur'));
    }
    public function store(Request $request)
    {
        $dbkredit = dbkredit::findOrFail($request->input('idkredit'));
        $transaksi = new dbalur();
        $transaksi->idkredit = $request->input('idkredit');
        $transaksi->judul = $request->judul;
        $transaksi->deskripsi = $request->deskripsi;
        $transaksi->daftar = $request->daftar;
        $transaksi->save();

        return redirect()->route('alukredit.index')->with('success', 'Transaction successful');
    }

    public function edit($id)
    {
        $alur = dbalur::findOrFail($id);
        $kredit = dbkredit::all();
        return view('admin.dbtalur_kredit.update', compact('alur', 'kredit'));
    }
    public function update(Request $request, $id)
    {
        // Temukan produk berdasarkan ID
        $produk = dbalur::findOrFail($id);
        $produk->idkredit = $request->idkredit;
        $produk->judul = $request->judul;
        $produk->deskripsi = $request->deskripsi;
        $produk->daftar = $request->daftar;

        // Simpan perubahan
        $produk->save();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('alukredit.index')->with('success', 'Produk berhasil diupdate.');
    }
    public function destroy($id, Request $request)
    {
        $data = dbalur::find($id);
        $data->delete();
        return redirect()->route('alukredit.index');
    }
}
