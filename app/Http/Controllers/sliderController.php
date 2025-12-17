<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    public function index()
    {
        $data = slider::all();
        return view('admin.slider.index', compact('data'));
    }
    public function tambah()
    {
        $data = slider::all();
        return view('admin.slider.create', compact('data'));
    }
    public function store(Request $request)
    {
        $data = slider::create($request->all());
        if (!empty($request->file('gambar'))) {
            $nama = md5($data->id);
            $folder = 'storage/slider';
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $file = $nama . "." . $extension;
            if (file_exists($folder . "/" . $file)) {
                unlink($folder . "/" . $file);
            }
            if ($request->file('gambar')->move($folder, $file)) {
                $data->gambar = $folder . "/" . $file;
                $data->save();
            }
        }
        $data->judul_gambar = $request->judul_gambar;
        $data->deskripsi = $request->deskripsi;

        return redirect(URL('/slider'));
    }
    public function edit($id)
    {
        $data = slider::find($id);
        return view('admin.slider.edit', compact('data'));
    }
    public function update($id, Request $request)
    {
        $data = slider::find($id);
        if (!empty($request->file('gambar'))) {
            $nama = md5($data->id);
            $folder = 'storage/slider';
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $file = $nama . "." . $extension;
            if (file_exists($folder . "/" . $file)) {
                unlink($folder . "/" . $file);
            }
            if ($request->file('gambar')->move($folder, $file)) {
                $data->gambar = $folder . "/" . $file;
                $data->save();
            }
        }
        $data->judul_gambar = $request->judul_gambar;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return redirect(URL('/slider'));
    }

    public function destroy($id, Request $request)
    {
        $data = slider::find($id);
        if (file_exists($data->gambar)) {
            unlink($data->gambar);
        }
        $data->delete();
        return redirect(URL('/slider'));
    }
}
