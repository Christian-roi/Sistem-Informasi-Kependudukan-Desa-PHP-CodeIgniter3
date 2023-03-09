<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-info">Edit Data Penduduk</h3>
        </div>
        <div class="card-body">
            <?php foreach ($penduduk as $pdk) : ?>
                <form method="post" action="<?php echo base_url() . 'penduduk/update'; ?>" enctype="multipart/form-data" class="my-4">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $pdk->id ?>">
                        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $pdk->nama_lengkap ?>">
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="<?php echo $pdk->nik ?>">
                    </div>
                    <div class="form-group">
                        <label>No KK</label>
                        <input type="text" name="no_kk" class="form-control" value="<?php echo $pdk->no_kk ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <?php
                            $jk = array('Laki-laki', 'Perempuan');
                            foreach ($jk as $j) {
                                if ($j == $pdk->jenis_kelamin) {
                                    echo "<option value='$j' selected>$j</option>";
                                } else {
                                    echo "<option value='$j'>$j</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat"><?php echo $pdk->alamat ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $pdk->tempat_lahir ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $pdk->tanggal_lahir ?>">
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" class="form-control">
                            <option selected disabled>Pilih Agama</option>
                            <?php
                            $agama = array('Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu');
                            foreach ($agama as $a) {
                                if ($a == $pdk->agama) {
                                    echo "<option value='$a' selected>$a</option>";
                                } else {
                                    echo "<option value='$a'>$a</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <select name="pendidikan_akhir" class="form-control">
                            <option selected disabled>Pilih Pendidikan Terakhir</option>
                            <?php
                            $pendidikan = array('Tidak Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/SMK/Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3');
                            foreach ($pendidikan as $p) {
                                if ($p == $pdk->pendidikan_akhir) {
                                    echo "<option value='$p' selected>$p</option>";
                                } else {
                                    echo "<option value='$p'>$p</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <select name="pekerjaan" class="form-control">
                            <option selected disabled>Pilih Pekerjaan</option>
                            <?php
                                $pekerjaan = $this->db->get('tb_pekerjaan')->result_array();
                                foreach ($pekerjaan as $pk) {
                                    if ($pk['nama'] == $pdk->pekerjaan) {
                                        echo "<option value='$pk[nama]' selected>$pk[nama]</option>";
                                    } else {
                                        echo "<option value='$pk[nama]'>$pk[nama]</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gol_darah">Golongan Darah</label>
                        <select class="form-control form-select" name="gol_darah" id="gol_darah" required oninvalid="this.setCustomValidity('Golongan Darah Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            <option selected disabled>Pilih Golongan Darah</option>
                            <?php
                            $gol_darah = array('A', 'B', 'AB', 'O');
                            foreach ($gol_darah as $gd) {
                                if ($gd == $pdk->gol_darah) {
                                    echo "<option value='$gd' selected>$gd</option>";
                                } else {
                                    echo "<option value='$gd'>$gd</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status Perkawinan</label>
                        <select name="status_perkawinan" class="form-control">
                            <option selected disabled>Pilih Status Perkawinan</option>
                            <?php
                            $status_perkawinan = array('Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati');
                            foreach ($status_perkawinan as $sp) {
                                if ($sp == $pdk->status_perkawinan) {
                                    echo "<option value='$sp' selected>$sp</option>";
                                } else {
                                    echo "<option value='$sp'>$sp</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status Hubungan Dalam Keluarga</label>
                        <select name="status_dalam_keluarga" class="form-control">
                            <option selected disabled>Pilih Status Hubungan Dalam Keluarga</option>
                            <?php
                            $status_dalam_keluarga = array('Kepala Keluarga', 'Istri', 'Anak', 'Famili Lain', 'Pembantu', 'Lainnya');
                            foreach ($status_dalam_keluarga as $shdk) {
                                if ($shdk == $pdk->status_dalam_keluarga) {
                                    echo "<option value='$shdk' selected>$shdk</option>";
                                } else {
                                    echo "<option value='$shdk'>$shdk</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kewarganegaraan</label>
                        <select name="kewarganegaraan" class="form-control">
                            <option selected disabled>Pilih Kewarganegaraan</option>
                            <?php
                            $kewarganegaraan = array('WNI (Warga Negara Indonesia)', 'WNA (Warga Negara Asing)');
                            foreach ($kewarganegaraan as $kwn) {
                                if ($kwn == $pdk->kewarganegaraan) {
                                    echo "<option value='$kwn' selected>$kwn</option>";
                                } else {
                                    echo "<option value='$kwn'>$kwn</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status Hidup</label>
                        <select name="status_hidup" class="form-control">
                            <option selected disabled>Pilih Status Hidup</option>
                            <?php
                            $status_hidup = array('Hidup', 'Sudah Meninggal');
                            foreach ($status_hidup as $sh) {
                                if ($sh == $pdk->status_hidup) {
                                    echo "<option value='$sh' selected>$sh</option>";
                                } else {
                                    echo "<option value='$sh'>$sh</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="form-control" value="<?php echo $pdk->nama_ayah ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="form-control" value="<?php echo $pdk->nama_ibu ?>">
                    </div>
                    <div class="form-group">
                        <label>Dusun</label>
                        <select name="dusun" class="form-control">
                            <option selected disabled>Pilih Dusun</option>
                            <?php
                                $dusun = $this->db->get('tb_dusun')->result_array();
                                foreach ($dusun as $d) {
                                    if ($d['nama_dusun'] == $pdk->dusun) {
                                        echo "<option value='$d[nama_dusun]' selected>$d[nama_dusun]</option>";
                                    } else {
                                        echo "<option value='$d[nama_dusun]'>$d[nama_dusun]</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control-file" value="<?php echo $pdk->foto ?>">
                        <img src="<?php echo base_url('uploads/') . $pdk->foto ?>" width="100" height="100" class="img-thumbnail">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('penduduk') ?>" class="btn btn-danger">Batal</a>
                </form>
            <?php endforeach; ?>
        </div>
        <div class="card-footer">
            <a href="<?php echo base_url('penduduk') ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>


</div>