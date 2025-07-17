@extends('layouts.template')

@section('title', 'Edit Pemesanan')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Edit Data Pemesanan</h3>
                        <a href="{{ url('/pemesanan') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ url('/pemesanan/' . $pemesanan->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="id_pelanggan" class="form-label">Pilih Pelanggan</label>
                                    <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
                                        <option value="">-- Pilih Pelanggan --</option>
                                        @foreach ($pelanggan as $p)
                                            <option value="{{ $p->id }}" {{ $pemesanan->id_pelanggan == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="id_tarif" class="form-label">Pilih Tarif</label>
                                    <select name="id_tarif" id="id_tarif" class="form-select" required>
                                        <option value="">-- Pilih Tarif --</option>
                                        @foreach ($tarif as $p)
                                            <option value="{{ $p->id }}" {{ $pemesanan->id_tarif == $p->id ? 'selected' : '' }}>
                                                {{ $p->dari }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tgl_tiket" class="form-label">Tanggal Tiket</label>
                                    <input type="date" name="tgl_tiket" class="form-control" id="tgl_tiket"
                                        value="{{ $pemesanan->tgl_tiket }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" id="jumlah"
                                        value="{{ $pemesanan->jumlah }}" min="1" required>
                                </div>

                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control" id="harga"
                                        value="{{ $pemesanan->harga }}" min="0" required>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select" required>
                                        @foreach (['pending', 'pengiriman', 'berhasil'] as $status)
                                            <option value="{{ $status }}" {{ $pemesanan->status === $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection