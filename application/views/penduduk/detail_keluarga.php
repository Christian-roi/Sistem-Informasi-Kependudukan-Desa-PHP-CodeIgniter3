<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-info">Data Keluarga</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-stripped">
                <?php 
                    $id = base64_decode($penduduk);

                    $sql = "SELECT * FROM tb_penduduk WHERE no_kk = '$id' AND status_dalam_keluarga = 'Kepala Keluarga'";
                    $query = $this->db->query($sql);
                    $data = $query->row();
                ?>

                <tr>
                    <th>No KK</th>
                    <td><?= $id ?></td>
                </tr>
                <tr>
                    <th>Nama Kepala Keluarga</th>
                    <td><?= $data->nama_lengkap ?></td>
                </tr>
                
                <tr>
                    <th>Anggota Keluarga</th>
                    <td>
                       <table class="table table-bordered table-stripped">
                           <thead>
                               <tr>
                                   <th>Nama Lengkap</th>
                                   <th>NIK</th>
                                   <th>Tempat Lahir</th>
                                   <th>Tanggal Lahir</th>
                                   <th>Jenis Kelamin</th>
                                   <th>Status Dalam Keluarga</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php 
                                    $no = 1;
                                    $sql = "SELECT * FROM tb_penduduk WHERE no_kk = '$id' AND status_dalam_keluarga != 'Kepala Keluarga'";
                                    $query = $this->db->query($sql);
                                    foreach ($query->result() as $row) :
                               ?>
                                    <tr>
                                        <td><?= $row->nama_lengkap ?></td>
                                        <td><?= $row->nik ?></td>
                                        <td><?= $row->tempat_lahir ?></td>
                                        <td><?= $row->tanggal_lahir ?></td>
                                        <td><?= $row->jenis_kelamin ?></td>
                                        <td><?= $row->status_dalam_keluarga ?></td>
                                    </tr>
                               <?php endforeach ?>
                           </tbody>
                          </table>

                    </td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('penduduk/data_keluarga') ?>" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>