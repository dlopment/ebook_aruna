<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dbalskred;
use App\Models\dbkredit;

class dbalskreditController extends Controller
{
    public function index()
    {
        $dbals = dbalskred::with('alskredit')->get();
        return view('admin.dbals_kredit.index', compact('dbals'));
    }

    public function create()
    {
        $dbals = dbkredit::all();
        return view('admin.dbals_kredit.cerate', compact('dbals'));
    }
    public function store(Request $request)
    {
        $dbkredit = dbkredit::findOrFail($request->input('idkred'));
        $transaksi = new dbalskred();
        $transaksi->idkred = $request->input('idkred');
        $transaksi->produk = $request->produk;
        $transaksi->setaw = $request->setaw;
        $transaksi->bunga = $request->bunga;
        $transaksi->admin = $request->admin;
        $transaksi->akses = $request->akses;
        $transaksi->flex = $request->flex;
        $transaksi->kel = $request->kel;
        $transaksi->kek = $request->kek;
        $transaksi->save();
        return redirect()->route('alskredit.index')->with('success', 'Transaction successful');
    }

    public function edit($id)
    {
        $alur = dbalskred::findOrFail($id);
        $kredit = dbkredit::all();
        return view('admin.dbals_kredit.update', compact('alur', 'kredit'));
    }
    public function update(Request $request, $id)
    {
        // Temukan produk berdasarkan ID
        $produk = dbalskred::findOrFail($id);
        $produk->idkredit = $request->idkredit;
        $produk->judul = $request->judul;
        $produk->deskripsi = $request->deskripsi;
        $produk->daftar = $request->daftar;

        // Simpan perubahan
        $produk->save();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('alskredit.index')->with('success', 'Produk berhasil diupdate.');
    }
    public function destroy($id, Request $request)
    {
        $data = dbalskred::find($id);
        $data->delete();
        return redirect()->route('alskredit.index');
    }
}
