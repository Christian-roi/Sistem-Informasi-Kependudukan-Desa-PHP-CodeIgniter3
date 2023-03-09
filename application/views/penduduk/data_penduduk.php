<div class="container-fluid">

    <!-- Tabel -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Penduduk</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered table-stripped" id="table_id" width="100%" cellspacing="0">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Tempat/Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <!-- <th>Agama</th> -->
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($penduduk as $p) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $p->nama_lengkap ?></td>
                                <td><?php echo $p->nik ?></td>
                                <td><?php
                                    $date = date('Y-m-d', strtotime($p->tanggal_lahir));
                                    $tanggal = tgl_indo($date);
                                    echo $p->tempat_lahir . ', ' . $tanggal; ?></td>
                                <td><?php echo $p->jenis_kelamin ?></td>
                                <!-- <td><?php echo $p->agama ?></td> -->
                                <td><?php echo $p->pekerjaan ?></td>
                                <td class="text-center">
                                    <li class="btn btn-warning btn-circle btn-sm dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="<?php echo site_url('word/permohonan_ktp/' . $p->id); ?>" target="_blank">
                                                <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Cetak Surat Permohonan KTP
                                            </a>
                                            <a class="dropdown-item" href="<?php echo site_url('word/permohonan_kk/' . $p->id); ?>" target="_blank">
                                                <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Cetak Surat Permohonan KK
                                            </a>
                                            <a class="dropdown-item" href="<?php echo site_url('word/surat_pindah/' . $p->id); ?>" target="_blank">
                                                <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Cetak Surat Keterangan Pindah
                                            </a>
                                            <?php
                                                if($p->status_hidup == 'Sudah Meninggal') {
                                                    echo '<a class="dropdown-item" href="'.site_url('word/surat_kematian/'.$p->id).'" target="_blank">
                                                    <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Cetak Surat Keterangan Kematian
                                                </a>';
                                                }
                                            ?>
                                        </div>
                                    </li>
                                    <a href="<?php echo site_url('penduduk/detail/' . $p->id); ?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                    <a href="<?php echo site_url('penduduk/edit/' . $p->id); ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo site_url('penduduk/hapus/' . $p->id); ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Data Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('penduduk/tambah_data'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap" required oninvalid="this.setCustomValidity('Nama Lengkap Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" required oninvalid="this.setCustomValidity('NIK Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="no_kk">No KK</label>
                                <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan No KK" required oninvalid="this.setCustomValidity('No KK Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" required oninvalid="this.setCustomValidity('Tempat Lahir Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" required oninvalid="this.setCustomValidity('Tanggal Lahir Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control form-select" name="jenis_kelamin" id="jenis_kelamin" required oninvalid="this.setCustomValidity('Jenis Kelamin Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan Alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control form-select" name="agama" id="agama" required oninvalid="this.setCustomValidity('Agama Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-- Pilih Agama --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gol_darah">Golongan Darah</label>
                                <select class="form-control form-select" name="gol_darah" id="gol_darah" required oninvalid="this.setCustomValidity('Golongan Darah Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-- Pilih Golongan Darah --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>

                            <!-- To Be Edited -->
                            <div class="form-group">
                                <label for="pendidikn_akhir">Pendidikan Terakhir</label>
                                <select class="form-control form-select" name="pendidikan_akhir" id="pendidikan_akhir" required oninvalid="this.setCustomValidity('Pendidikan Terakhir Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-- Pilih Pendidikan Terakhir --</option>
                                    <?php
                                    $pendidikan = array('Tidak Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/SMK/Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3');
                                    foreach ($pendidikan as $p) {
                                        echo "<option value='$p'>$p</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <select class="form-control" name="pekerjaan" required oninvalid="this.setCustomValidity('Pekerjaan Tidak Boleh Kosong')" oninput="setCustomValidity('')" style="overflow-y: scroll;">
                                    <option selected disabled>-- Pilih Pekerjaan --</option>
                                    <?php
                                        $pekerjaan = $this->db->get('tb_pekerjaan')->result_array();
                                        foreach ($pekerjaan as $p) {
                                            echo "<option value='$p[nama]'>$p[nama]</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status_perkawinan">Status Perkawinan</label>
                                <select class="form-control form-select" name="status_perkawinan" id="status_perkawinan" required oninvalid="this.setCustomValidity('Status Perkawinan Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-- Pilih Status Perkawinan --</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status_dalam_keluarga">Status Dalam Keluarga</label>
                                <select class="form-control form-select" name="status_dalam_keluarga" id="status_dalam_keluarga" required oninvalid="this.setCustomValidity('Status Dalam Keluarga Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-- Pilih Status Dalam Keluarga --</option>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Famili Lain">Famili Lain</option>
                                    <option value="Pembantu">Pembantu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status_hidup">Status Hidup</label>
                                <select class="form-control form-select" name="status_hidup" id="status_hidup" required oninvalid="this.setCustomValidity('Status Hidup Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-- Pilih Status Hidup --</option>
                                    <option value="Hidup">Hidup</option>
                                    <option value="Mati">Sudah Meninggal</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <select class="form-control form-select" name="kewarganegaraan" id="kewarganegaraan" required oninvalid="this.setCustomValidity('Kewarganegaraan Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                    <option value="">-- Pilih Kewarganegaraan --</option>
                                    <option value="WNI (Warga Negara Indonesia)">WNI (Warga Negara Indonesia)</option>
                                    <option value="WNA (Warga Negara Asing)">WNA (Warga Negara Asing)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah" required oninvalid="this.setCustomValidity('Nama Ayah Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu" required oninvalid="this.setCustomValidity('Nama Ibu Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group">
                                <label for="dusun">Dusun</label>
                                <select class="form-control form-select" name="dusun" id="dusun" required oninvalid="this.setCustomValidity('Dusun Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-- Pilih Dusun --</option>
                                    <?php 
                                        $dusun = $this->db->get('tb_dusun')->result_array();
                                        foreach ($dusun as $d) {
                                            echo '<option value="'.$d['nama_dusun'].'">'.$d['nama_dusun'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control-file" name="foto" id="foto" placeholder="Masukkan Foto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php

        function tgl_indo($tanggal)
        {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }
        ?>