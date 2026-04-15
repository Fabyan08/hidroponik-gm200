@include('layouts.dashboard.header')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pendaftar Pelatihan</h1>
        </div>

        <div class="section-body">
            <a href="/manajemen-pelatihan" class="flex items-center text-xl gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                </svg>
                Kembali
            </a>

            <div class="flex items-center justify-between mb-3">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">+ Tambah
                    Data</a>
            </div>
            <div class="row">
                <div class="col-12">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image"
                                style="background-image: url('{{ asset('storage/' . $data->image) }}'); height: 300px; background-size: cover;">
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title">
                                <h2>{{ $data->title }}</h2>
                            </div>
                            <p>{{ $data->description }}</p>
                            <ul class="list-unstyled mt-3">
                                <li><strong>📅 Tanggal:</strong> {{ $data->date }}</li>
                                <li><strong>📍 Lokasi:</strong> {{ $data->location }}</li>
                                <li><strong>👥 Kuota:</strong> {{ $data->quota }} orang</li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h1>Pendaftar</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Pekerjaan</th>
                                            <th>Institusi</th>
                                            <th class="text-center">Hapus</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($registrations as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->pekerjaan }}</td>
                                                <td>{{ $item->institusi ?? '-' }}</td>

                                                <td class="text-center">
                                                    <form action="{{ route('pendaftar.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin hapus pendaftar ini?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">
                                                    Belum ada pendaftar
                                                </td>
                                            </tr>
                                        @endforelse
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

            <form action="{{ route('pelatihan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pelatihan</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul</label>
                        <div class="col-sm-9">
                            <input type="text" required name="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea name="description" required class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="date" required
                                class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Lokasi</label>
                        <div class="col-sm-9">
                            <input type="text" required name="location" class="form-control"
                                value="{{ old('location') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kuota</label>
                        <div class="col-sm-9">
                            <input type="number" required name="quota" class="form-control"
                                value="{{ old('quota') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gambar</label>
                        <div class="col-sm-9">
                            <input type="file" required name="image"
                                class="form-control @error('image') is-invalid @enderror">
                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>

@include('layouts.dashboard.footer')
