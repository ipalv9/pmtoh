<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nomor = 1;
        $tarif = Tarif::all();
        return view('layouts.tarif.index',compact('tarif','nomor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // menampilkan form tambah
         return view('layouts.tarif.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses tambah
        $request->validate([
        'dari' => 'required',
        'tujuan' => 'required'
        'tarif' => 'required,
    ]);
        $tarif = new Tarif;
        $tarif->dari = $request->dari;
        $tarif->tujuan = $request->tujuan;
        $tarif->tarif = $request->tarif;
        $tarif->save();

        return redirect('/tarif');
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
         // form edit
        $tarif = Tarif::find($id);
        return view('layouts.tarif.edit',compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        // proses edit
        $tarif = Tarif::find($id);
        $tarif->dari = $request->dari;
        $tarif->tujuan = $request->tujuan;
        $tarif->tarif = $request->tarif;
        $tarif->save();

        return redirect('/tarif');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // proses hapus
        $tarif = Tarif::findOrFail($id);
        $tarif->delete();

    return redirect('/tarif')->with('success', 'Data berhasil dihapus');
    }
}
