<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\sliderberita;
class kontakController extends Controller
{

    public function tampilberita()
    {
        $berita = sliderberita::all();
        return view('sliderkontak.index', compact('berita'));
    }
    public function tambahberita()
    {
        $berita = sliderberita::all();
        return view('sliderkontak.create', compact('berita'));
    }
    public function storeberita(Request $request)
    {
        $berita = sliderberita::create($request->all());
        if (!empty($request->file('gambar'))) {
            $nama = md5($berita->id);
            $folder = 'portofolio/storage/berita/slider';
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $file = $nama . "." . $extension;
            if (file_exists($folder . "/" . $file)) {
                unlink($folder . "/" . $file);
            }
            if ($request->file('gambar')->move($folder, $file)) {
                $berita->gambar = $folder . "/" . $file;
                $berita->save();
            }
        }
        return redirect(URL('/sliderberita'));
    }
    public function editberita($id)
    {
        $berita = sliderberita::find($id);
        return view('berita.slider.edit', compact('berita'));
    }
    public function updateberita($id, Request $request)
    {
        $berita = sliderberita::find($id);
        $berita->judul = $request->judul;
        if (!empty($request->file('gambar'))) {
            $nama = md5($berita->id);
            $folder = 'portofolio/storage/berita/slider';
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $file = $nama . "." . $extension;
            if (file_exists($folder . "/" . $file)) {
                unlink($folder . "/" . $file);
            }
            if ($request->file('gambar')->move($folder, $file)) {
                $berita->gambar = $folder . "/" . $file;
                $berita->save();
            }
        }
        $berita->save();
        return redirect(URL('/sliderberita'));
    }

    public function destroyberita($id, Request $request)
    {
        $berita = sliderberita::find($id);
        if (file_exists($berita->gambar)) {
            unlink($berita->gambar);
        }
        $berita->delete();
        return redirect(URL('/sliderberita'));
    }
}