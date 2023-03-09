<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-info">Edit Data Dusun</h3>
        </div>

        <div class="card-body">
            <form action="<?= base_url('dusun/update_data') ?>" method="post" enctype="multipart/form-data">
                <?php foreach ($dusun as $ds) : ?>
                    <div class="form-group">
                        <label for="nama_dusun">Nama Dusun</label>
                        <input type="hidden" name="id_dusun" value="<?= $ds->id_dusun ?>">
                        <input type="text" name="nama_dusun" id="nama_dusun" class="form-control" value="<?= $ds->nama_dusun ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama_kadus">Nama Kepala Dusun</label>
                        <input type="text" name="nama_kadus" id="nama_kadus" class="form-control" value="<?= $ds->nama_kadus ?>">
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control-file" value="<?php echo $ds->foto ?>">
                        <img src="<?php echo base_url('uploads/') . $ds->foto ?>" width="100" height="100" class="img-thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('dusun') ?>" class="btn btn-danger">Kembali</a>
                <?php endforeach; ?>
            </form>
        </div>

    </div>

</div>

</div>