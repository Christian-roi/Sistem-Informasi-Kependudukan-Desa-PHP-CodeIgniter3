<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-danger">
        <div class="container" id="page-top">
            <a class="navbar-brand" href="<?= base_url('home'); ?>"><img src="<?= base_url('assets/img/Lambang_Kabupaten_Deli_Serdang.png'); ?>" alt="" width="30" height="30" class="d-inline-block align-text-top"> DESA SIDOMULYO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('home'); ?>">Home</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url('home/data'); ?>">Data Penduduk</a></li> -->
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('home/pesan'); ?>">Kotak Surat</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/login'); ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container mt-5">
        <?= $this->session->flashdata('message'); ?>
        <!-- Container for alert -->
        <div class="row">
            <div class="col-md-4">
                <div class="alert alert-warning shadow mb-5" role="alert" style="border-radius: 20px; max-width: 50rem; margin: auto; min-height: 500px;">
                    <div class="p-1">
                        <p><strong>Perhatian!</strong></p>
                        <p>Untuk mengirim pesan, silahkan isi form di bawah ini.</p>
                        <p>Jika anda ingin melakukan permohonan pembuatan surat, silahkan lakukan hal berikut:</p>
                        <ol>
                            <li>Ketikkan NIK anda pada kolom <strong>Isi Pesan</strong></li>
                            <li>Pilih <strong>Jenis Pesan</strong> sesuai dengan surat yang anda inginkan</li>
                            <li>Ketikkan perihal surat anda serta surat tersebut dibutuhkan untuk apa pada kolom <strong>Isi Pesan</strong></li>
                            <li>Masukkan No HP anda pada kolom <strong>No HP</strong>, petugas akan menghubungi anda untuk mengkonfirmasi surat yang anda minta</li>
                            <li>Klik tombol <strong>Kirim Pesan</strong></li>
                            <li>Setelah mengirim pesan, silahkan datang ke kantor desa untuk mengambil surat yang telah dibuat</li>
                        </ol>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-5 shadow" style="border-radius: 20px; max-width: 50rem; margin: auto;">

                    <div class="card-header bg-gradient-warning text-white" style="border-radius: 20px 20px 0 0;">
                        <h3 class="text-center">Kotak Surat</h3>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-10">
                                <form action="<?= base_url('home/kirim_pesan'); ?>" method="post" class="form-horizontal mt-3 mb-3 my-3">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap Anda" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                                    </div>

                                    <div class="form-group">
                                        <label for="nohp">No HP</label>
                                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No HP" required oninvalid="this.setCustomValidity('No HP tidak boleh kosong')" oninput="setCustomValidity('')">
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis">Jenis Pesan</label>
                                        <select class="form-control form-select" id="jenis" name="jenis" required oninvalid="this.setCustomValidity('Jenis Pesan tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <option selected disabled>Pilih Jenis Pesan</option>
                                            <?php
                                            $jenis = array('Permohonan Surat Pembuatan KTP', 'Permohonan Surat Pembuatan KK', 'Permohonan Surat Pindah', 'Permohonan Surat Kematian', 'Pesan Biasa/Pengaduan/Masukan');
                                            foreach ($jenis as $j) {
                                                echo "<option value='$j'>$j</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="isi">Isi Pesan</label>
                                        <textarea class="form-control" id="isi" name="isi" rows="6" placeholder="Masukkan Pesan" required oninvalid="this.setCustomValidity('Pesan tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Footer-->
    <footer class="py-3 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; 2022 Desa Sidomulyo</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- <script src="js/scripts.js"></script> -->
</body>