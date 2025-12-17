<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lks;

class lksControllers extends Controller
{
    public function index()
    {
        $deposito = lks::all();
        return view('admin.dbkredit.index', compact('deposito'));
    }
    public function create()
    {
        return view('admin.dbkredit.cerate');
    }
    public function store(Request $request)
    {
        lks::create([
            'nama_produk' => $request->nama_produk,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,

            'nama_produk' => $request->nama_produk,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,

            'nama_produk' => $request->nama_produk,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,

            'nama_produk' => $request->nama_produk,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,

            'nama_produk' => $request->nama_produk,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,

            'nama_produk' => $request->nama_produk,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,

            'nama_produk' => $request->nama_produk,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,

            'nama_produk' => $request->nama_produk,
            'desprod' => $request->desprod,
            'plafon' => $request->plafon,
            'jnk_waktu' => $request->jnk_waktu,
            'bunga' => $request->bunga,
            'kelebihan' => $request->kelebihan,
            'peryrtnketum' => $request->peryrtnketum,
            'non_per' => $request->non_per,

            'nama_produk' => $request->nama_produk,
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
}
