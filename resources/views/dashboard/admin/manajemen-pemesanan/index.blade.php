@include('layouts.dashboard.header')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Data Pemesanan</h1>
        </div>

        <div class="section-body">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <h2 class="section-title">Manajemen Pemesanan</h2>
                    <p class="section-lead">
                        Kamu dapat mengelola data pemesanan di halaman ini.
                    </p>
                </div>
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
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
                                            <th>Jumlah Order</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>#{{ $item->id }}</td>

                                                <td>{{ \Carbon\Carbon::parse($item->order_date)->format('d M Y H:i') }}
                                                </td>

                                                <td>{{ $item->name }}</td>

                                                <td>{{ $item->phone }}</td>

                                                <td>{{ Str::limit($item->address, 40) }}</td>

                                                <td>{{ $item->items_count }} item</td>

                                                <td>
                                                    <a href="{{ route('manajemen-pemesanan.show', $item->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        Detail
                                                    </a>
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
@include('layouts.dashboard.footer')
