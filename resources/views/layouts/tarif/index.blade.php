@extends('layouts.template')

@section('title', 'pelanggan')

<!-- @section('headline')
    Pelanggan
@endsection -->

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Daftar Tarif</h2>
                    <a href="{{ url('/tarif/create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-user-plus me-1"></i> Tambah Data
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Dari</th>
                                    <th class="text-center">Tujuan</th>
                                    <th class="text-center">Tarif</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tarif as $data)
                                    <tr>
                                        <td>{{ $nomor++ }}</td>
                                        <td>{{ $data->dari }}</td>
                                        <td>{{ $data->tujuan }}</td>
                                        <td>Rp {{ number_format($data->tarif, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <!-- Tombol Edit -->
                                                <a href="{{ url('/tarif/edit/' . $data->id) }}"
                                                    class="btn btn-outline-info btn-sm" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#modalHapus{{ $data->id }}"
                                                    title="Hapus">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="modalHapus{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="modalLabel{{ $data->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ url('/tarif/' . $data->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel{{ $data->id }}">
                                                                    Konfirmasi Hapus
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Yakin ingin menghapus pelanggan
                                                                <strong>{{ $data->dari }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Data tidak tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection