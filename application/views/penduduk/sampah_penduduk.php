<div class="container-fluid">
    <div class="container-fluid">

        <!-- Tabel -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="m-0 font-weight-bold text-primary">Data Penduduk</h3>
                    </div>
                    <!-- <div class="col-md-6 text-right">
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
                    </div> -->
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
                                <th>Agama</th>
                                <th>Kewarganegaraan</th>
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
                                    <td><?php echo $p->agama ?></td>
                                    <td><?php echo $p->kewarganegaraan ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo site_url('admin/detail/' . $p->id); ?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                        <a href="<?php echo site_url('admin/restore/' . $p->id); ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-trash-restore"></i></a>
                                        <a href="<?php echo site_url('admin/hapus_permanen/' . $p->id); ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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