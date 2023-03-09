<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Keluarga</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered table-stripped" id="table_id" width="100%" cellspacing="0">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>No</th>
                            <th>No Kartu Keluarga</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = "SELECT * FROM tb_penduduk GROUP BY no_kk";
                        $query = $this->db->query($sql);
                        foreach ($query->result() as $row) :
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->no_kk ?></td>
                                <td><?php
                                    $sql = "SELECT * FROM tb_penduduk WHERE no_kk = '$row->no_kk' AND status_dalam_keluarga = 'Kepala Keluarga'";
                                    $query = $this->db->query($sql);
                                    if ($query->num_rows() > 0) {
                                        $data = $query->row();
                                        echo $data->nama_lengkap;
                                    } else {
                                        echo "-";
                                    }
                                    ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('penduduk/detail_keluarga/' . base64_encode($row->no_kk)) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>