@include('layouts.dashboard.header')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manajemen Medsos</h1>
        </div>

        <div class="section-body">

            <h2 class="section-title">Buat Konten</h2>
            <p class="section-lead">
                Upload gambar & generate caption untuk Instagram.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- FORM -->
                            <div class="row">

                                <!-- IMAGE -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Upload Gambar</label>
                                        <input type="file" class="form-control">
                                    </div>
                                </div>

                                <!-- CONTENT -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Deskripsi Konten</label>
                                        <textarea class="form-control" rows="4" placeholder="Contoh: promo selada hidroponik fresh tanpa pestisida"></textarea>
                                    </div>


                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Tipe Konten</label>
                                        <select class="form-control">
                                            <option>Promo</option>
                                            <option>Edukasi</option>
                                            <option>Testimoni</option>
                                            <option>Tips</option>
                                        </select>
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-right">
                                        <button class="btn btn-success">Generate Rekomendasi AI</button>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            {{-- di sini tampil jam posting & caption --}}
                            <div class="form-group text-right">
                                <button class="btn btn-warning">Simpan & Jadwalkan</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <h2 class="section-title mt-5">Riwayat Konten</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gambar</th>
                                        <th>Tipe</th>
                                        <th>Caption</th>
                                        <th>Jadwal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <!-- DATA DUMMY -->
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="https://via.placeholder.com/60" width="60">
                                        </td>
                                        <td>Promo</td>
                                        <td>Panen segar langsung dari GM200...</td>
                                        <td>2026-04-20 07:00</td>
                                        <td><span class="badge badge-info">Scheduled</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info">Copy</button>
                                            <button class="btn btn-sm btn-warning">Edit</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <img src="https://via.placeholder.com/60" width="60">
                                        </td>
                                        <td>Edukasi</td>
                                        <td>Hidroponik adalah metode tanam tanpa tanah...</td>
                                        <td>-</td>
                                        <td><span class="badge badge-warning">Draft</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info">Copy</button>
                                            <button class="btn btn-sm btn-warning">Edit</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <img src="https://via.placeholder.com/60" width="60">
                                        </td>
                                        <td>Testimoni</td>
                                        <td>Sayurannya fresh banget, recommended!</td>
                                        <td>2026-04-18 19:00</td>
                                        <td><span class="badge badge-success">Posted</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info">Copy</button>
                                            <button class="btn btn-sm btn-warning">Edit</button>
                                        </td>
                                    </tr>

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
</div>

@extend('dashboard.layouts.footer')
