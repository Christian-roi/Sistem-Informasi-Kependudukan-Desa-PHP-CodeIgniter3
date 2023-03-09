<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Dusun</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah_data_dusun"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered table-stripped" id="table_id" width="100%" cellspacing="0">
                    <thead class="bg-danger text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Dusun</th>
                            <th>Nama Kepala Dusun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dusun as $ds) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $ds->nama_dusun ?></td>
                                <td><?= $ds->nama_kadus ?></td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('dusun/detail/' . $ds->id_dusun); ?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                    <a href="<?php echo site_url('dusun/edit/' . $ds->id_dusun); ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo site_url('dusun/hapus/' . $ds->id_dusun); ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_data_dusun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Data Dusun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dusun/tambah_data') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_dusun">Nama Dusun</label>
                        <input type="text" name="nama_dusun" id="nama_dusun" class="form-control" placeholder="Masukkan Nama Dusun">
                    </div>

                    <div class="form-group">
                        <label for="nama_kadus">Nama Kepala Dusun</label>
                        <input type="text" name="nama_kadus" id="nama_kadus" class="form-control" placeholder="Masukkan Nama Kepala Dusun">
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control-file">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
        </div>
    </div>