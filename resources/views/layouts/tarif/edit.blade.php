@extends('layouts.template')

@section('title', 'Edit Pelanggan')

<!-- @section('headline')
    Edit Data Pelanggan
@endsection -->

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Edit Tarif</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/tarif/' . $tarif->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="dari" class="form-label">Dari</label>
                                <input type="text" class="form-control" id="dari" name="dari" value="{{ $tarif->dari }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan"
                                    value="{{ $tarif->tujuan }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tarif" class="form-label">Tarif</label>
                                <input type="number" class="form-control" id="tarif" name="tarif"
                                    value="{{ $tarif->tarif }}" min="0" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/tarif') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection