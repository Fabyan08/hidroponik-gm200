@include('layouts.dashboard.header')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Data Produksi</h1>
        </div>

        <div class="section-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <h2 class="section-title">Manajemen Produksi</h2>
                    <p class="section-lead">
                        Kamu dapat mengelola data produksi di halaman ini.
                    </p>
                </div>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">+ Tambah
                    Data</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanaman</th>
                                            <th>Tanggal Tanam</th>
                                            <th>Panen</th>
                                            <th>Jumlah</th>
                                            <th>Catatan</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->plant_name }}</td>
                                                <td>{{ $item->planting_date }}</td>
                                                <td>{{ $item->harvest_date }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ Str::limit($item->notes, 50) }}</td>

                                                <td>
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#modalEdit-{{ $item->id }}">
                                                        Edit
                                                    </button>
                                                </td>

                                                <td>
                                                    <form action="{{ route('manajemen-produksi.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Hapus data?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('manajemen-produksi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <!-- Nama Tanaman -->
                    <div class="form-group">
                        <label>Nama Tanaman</label>
                        <input type="text" name="plant_name"
                            class="form-control @error('plant_name') is-invalid @enderror"
                            value="{{ old('plant_name') }}">

                        @error('plant_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Tanam -->
                    <div class="form-group">
                        <label>Tanggal Tanam</label>
                        <input type="date" name="planting_date"
                            class="form-control @error('planting_date') is-invalid @enderror"
                            value="{{ old('planting_date') }}">

                        @error('planting_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Panen -->
                    <div class="form-group">
                        <label>Tanggal Panen</label>
                        <input type="date" name="harvest_date"
                            class="form-control @error('harvest_date') is-invalid @enderror"
                            value="{{ old('harvest_date') }}">

                        @error('harvest_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jumlah -->
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="quantity"
                            class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">

                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Catatan -->
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="notes" class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>

                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>

@foreach ($data as $product)
    <div class="modal fade" id="modalEdit-{{ $product->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ route('manajemen-produksi.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Produk</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Tanaman</label>
                            <input type="text" name="plant_name"
                                class="form-control @error('plant_name') is-invalid @enderror"
                                value="{{ old('plant_name', $item->plant_name) }}">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Tanam</label>
                            <input type="date" name="planting_date"
                                class="form-control @error('planting_date') is-invalid @enderror"
                                value="{{ old('planting_date', $item->planting_date) }}">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Panen</label>
                            <input type="date" name="harvest_date"
                                class="form-control @error('harvest_date') is-invalid @enderror"
                                value="{{ old('harvest_date', $item->harvest_date) }}">
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="quantity"
                                class="form-control @error('quantity') is-invalid @enderror"
                                value="{{ old('quantity', $item->quantity) }}">
                        </div>

                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea name="notes" class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $item->notes) }}</textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endforeach
@include('layouts.dashboard.footer')
