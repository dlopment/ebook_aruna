<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\dbdeposito;
use App\Models\dbkredit;
use App\Models\dbtabungan;
use App\Models\dblayanan;
use App\Models\dbpromo;
use App\Models\dbalur;
use App\Models\dbalskred;

class welcomeController extends Controller
{
    public function dashboard()
    {
        return view('dhasboard');
    }
    public function index()
    {
        $slider = slider::get();
        return view('home', compact('slider'));
    }

    public function deposito($id)
    {
        $deposito = dbdeposito::find($id);
        return view('produk_view.produk_detail.deposito', compact('deposito'));
    }
    public function tabungan($id)
    {
        $tabungan = dbtabungan::find($id);
        return view('produk_view.produk_detail.tabungan', compact('tabungan'));
    }
    public function kredit($id)
    {
        $dbals = dbalskred::where('idkred', $id)->get();
        $dbalur = dbalur::where('idkredit', $id)->get();
        $kredit = dbkredit::find($id);
        return view('produk_view.produk_detail.kredit', compact('kredit', 'dbalur', 'dbals'));
    }
    public function layanan($id)
    {
        $layanan = dblayanan::find($id);
        return view('produk_view.produk_detail.layanan', compact('layanan'));
    }
    public function promo($id)
    {
        $promo = dbpromo::find($id);
        return view('produk_view.produk_detail.promo', compact('promo'));
    }

    public function viewdeposito()
    {
        $deposito = dbdeposito::all();
        return view('produk_view.viewdeposito', compact('deposito'));
    }
    public function viewabungan()
    {
        $tabungan = dbtabungan::all();
        return view('produk_view.viewtabungan', compact('tabungan'));
    }
    public function viewkredit()
    {
        $kredit = dbkredit::all();
        return view('produk_view.viewkredit', compact('kredit'));
    }
    public function viewlayanan()
    {
        $layanan = dblayanan::all();
        return view('produk_view.viewlayanan', compact('layanan'));
    }
    public function viewpromo()
    {
        $promo = dbpromo::all();
        return view('produk_view.viewpromo', compact('promo'));
    }
    public function detail()
    {
        $deposito = dbdeposito::all();
        $kredit = dbkredit::all();
        $tabungan = dbtabungan::all();
        return view('produk_view.produkall', compact('tabungan', 'deposito', 'kredit'));
    }
}
