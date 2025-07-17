<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Pelanggan;
use App\Models\Tarif;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nomor = 1;
        $pemesanan = Pemesanan::all();
        return view('layouts.pemesanan.index',compact('pemesanan','nomor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // menampilkan form tambah
        $tarif = Tarif::all();
        $pelanggan = Pelanggan::all(); // Untuk dropdown pelanggan
         return view('layouts.pemesanan.create', compact('pelanggan','tarif'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan'     => 'required',
            'id_tarif'         => 'required',
            'tgl_tiket'        => 'required|date',
            'jumlah'           => 'required|integer|min:1',
            'harga'            => 'required|numeric|min:0',
            'status'           => 'required|in:pending,berhasil,pengiriman',
        ]);

        $pemesanan = new Pemesanan();
        $pemesanan->id_pelanggan= $request->id_pelanggan;
        $pemesanan->id_tarif= $request->id_tarif;
        $pemesanan->tgl_tiket = $request->tgl_tiket;
        $pemesanan->jumlah = $request->jumlah;
        $pemesanan->harga = $request->harga;
        $pemesanan->status = $request->status;
        $pemesanan->save();

        Pemesanan::create($request->all());

        return redirect('/pemesanan')->with('success', 'Detail pesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tarif = Tarif::all();
        $pelanggan = Pelanggan::all();
        $pemesanan = Pemesanan::find($id);
        return view('layouts.pemesanan.edit',compact('pemesanan','pelanggan','tarif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'id_pelanggan'     => 'required',
            'id_tarif'         => 'required',
            'tgl_tiket'        => 'required|date',
            'jumlah'           => 'required|integer|min:1',
            'harga'            => 'required|numeric|min:0',
            'status'           => 'required|in:pending,berhasil,pengiriman',
        ]);
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->id_pelanggan = $request->id_pelanggan;
        $pemesanan->id_tarif = $request->id_tarif;
        $pemesanan->tgl_tiket = $request->tgl_tiket;
        $pemesanan->jumlah = $request->jumlah;
        $pemesanan->harga = $request->harga;
        $pemesanan->status = $request->status;
        $pemesanan->save();

        return redirect('/pemesanan')->with('success', 'pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // proses hapus
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

    return redirect('/pemesanan')->with('success', 'Data berhasil dihapus');
    }
}
