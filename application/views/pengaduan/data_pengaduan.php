<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Pengaduan</h3>
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
                            <th>Nama Pengadu</th>
                            <th>No Telepon</th>
                            <th>Jenis Pesan</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Isi Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengaduan as $p) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p->nama ?></td>
                                <td><?= $p->nohp ?></td>
                                <td><?= $p->jenis ?></td>
                                <td><?= $p->tgl_kirim ?></td>
                                <td class="text-center"><button class="btn btn-outline-primary" data-toggle="modal" data-target="#detail<?= $p->id ?>"><i class="fas fa-eye fa-sm"></i> Detail</button></td>
                                <td class="text-center"><a href="<?= base_url('pengaduan/hapus/' . $p->id) ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"><i class="fas fa-trash fa-sm"></i></a></td>
                            </tr>

                            <div class="modal fade" id="detail<?= $p->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Detail Pengaduan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="text-center"><?= $p->isi ?></h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>