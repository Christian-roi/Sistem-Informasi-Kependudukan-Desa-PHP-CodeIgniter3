<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-info">Data Dusun</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <?php foreach ($dusun as $ds) : ?>
                    <tr>
                        <th>Nama Dusun</th>
                        <td><?php echo $ds->nama_dusun ?></td>
                    </tr>
                    <tr>
                        <th>Nama Kepala Dusun</th>
                        <td><?php echo $ds->nama_kadus ?></td>
                    </tr>
                    <tr>
                        <th>Foto Kepala Dusun</th>
                        <td>
                            <img src="<?php echo base_url('./uploads/') . $ds->foto ?>" width="100px">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <a href="<?php echo base_url('dusun') ?>" class="btn btn-danger">Kembali</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>