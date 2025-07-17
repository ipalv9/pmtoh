@extends('layouts.template')

@section('title', 'Tambah Pelanggan')

<!-- @section('headline')
    Form Tambah Pelanggan
@endsection -->




@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Form Tambah Tarif</h3>
                        <a href="{{ url('/tarif') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ url('/tarif') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="dari" class="form-label">Dari</label>
                                    <input type="text" name="dari" class="form-control" id="dari"
                                        placeholder="Masukkan Tempat Keberangkatan" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" id="tujuan"
                                        placeholder="Masukkan Tujuan Anda" required>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection