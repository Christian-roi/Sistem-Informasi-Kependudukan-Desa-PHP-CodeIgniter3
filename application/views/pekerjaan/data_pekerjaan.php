<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Pekerjaan</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah_data_pekerjaan"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered table-stripped" id="table_id" width="100%" cellspacing="0">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Pekerjaan</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pekerjaan as $p) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p->nama ?></td>
                                <td><?= $p->jenis ?></td>
                                <td class="text-center">
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#edit_data_pekerjaan_<?= $p->id ?>"><i class="fas fa-edit fa-sm"></i></button>
                                    <a href="<?= base_url('pekerjaan/hapus/' . $p->id) ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="tambah_data_pekerjaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Data Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pekerjaan/tambah_data') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Pekerjaan</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Pekerjaan">
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis Pekerjaan</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option selected disabled>Pilih Jenis Pekerjaan</option>
                            <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                            <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                            <option value="Pensiunan">Pensiunan</option>
                            <option value="Aparatur/Pejabat Negara">Aparatur/Pejabat Negara</option>
                            <option value="Tenaga Pengajar">Tenaga Pengajar</option>
                            <option value="Tenaga Kesehatan">Tenaga Kesehatan</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Pertanian/Peternakan">Pertanian/Peternakan</option>
                            <option value="Nelayan/Perikanan">Nelayan/Perikanan</option>
                            <option value="Agama/Kepercayaan">Agama/Kepercayaan</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <?php foreach ($pekerjaan as $p) : ?>
        <div class="modal fade" id="edit_data_pekerjaan_<?= $p->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">
                        <form action="<?= base_url('pekerjaan/edit_data/' . $p->id) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Pekerjaan</label>
                                <input type="hidden" name="id" value="<?= $p->id ?>">
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $p->nama ?>">
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis Pekerjaan</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option selected disabled>Pilih Jenis Pekerjaan</option>
                                    <option value="Belum/Tidak Bekerja" <?= $p->jenis == 'Belum/Tidak Bekerja' ? 'selected' : '' ?>>Belum/Tidak Bekerja</option>
                                    <option value="Mengurus Rumah Tangga" <?= $p->jenis == 'Mengurus Rumah Tangga' ? 'selected' : '' ?>>Mengurus Rumah Tangga</option>
                                    <option value="Pelajar/Mahasiswa" <?= $p->jenis == 'Pelajar/Mahasiswa' ? 'selected' : '' ?>>Pelajar/Mahasiswa</option>
                                    <option value="Pensiunan" <?= $p->jenis == 'Pensiunan' ? 'selected' : '' ?>>Pensiunan</option>
                                    <option value="Aparatur/Pejabat Negara" <?= $p->jenis == 'Aparatur/Pejabat Negara' ? 'selected' : '' ?>>Aparatur/Pejabat Negara</option>
                                    <option value="Tenaga Pengajar" <?= $p->jenis == 'Tenaga Pengajar' ? 'selected' : '' ?>>Tenaga Pengajar</option>
                                    <option value="Tenaga Kesehatan" <?= $p->jenis == 'Tenaga Kesehatan' ? 'selected' : '' ?>>Tenaga Kesehatan</option>
                                    <option value="Wiraswasta" <?= $p->jenis == 'Wiraswasta' ? 'selected' : '' ?>>Wiraswasta</option>
                                    <option value="Pertanian/Peternakan" <?= $p->jenis == 'Pertanian/Peternakan' ? 'selected' : '' ?>>Pertanian/Peternakan</option>
                                    <option value="Nelayan/Perikanan" <?= $p->jenis == 'Nelayan/Perikanan' ? 'selected' : '' ?>>Nelayan/Perikanan</option>
                                    <option value="Agama/Kepercayaan" <?= $p->jenis == 'Agama/Kepercayaan' ? 'selected' : '' ?>>Agama/Kepercayaan</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>