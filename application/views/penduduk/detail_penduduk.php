<div class="container-fluid">


    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-primary">Detail Data Penduduk</h3>
                </div>
                <!-- <div class="col-md-6">
                    <a href="<?php echo base_url('word/index/'.$penduduk[0]->id) ?>" class="btn btn-primary float-right"><i class="fas fa-file-word"></i> Buat Surat</a>
                </div> -->
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <?php foreach ($penduduk as $pdk) : ?>
                    <tr>
                        <th>Foto</th>
                        <td>
                            <img src="<?php echo base_url('./uploads/') . $pdk->foto ?>" width="100px">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td><?php echo $pdk->nama_lengkap ?></td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td><?php echo $pdk->nik ?></td>
                    </tr>
                    <tr>
                        <th>No KK</th>
                        <td><?php echo $pdk->no_kk ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?php echo $pdk->jenis_kelamin ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $pdk->alamat ?></td>
                    </tr>
                    <tr>
                        <th>Tempat/Tanggal Lahir</th>
                        <td><?php
                            $date = date('Y-m-d', strtotime($pdk->tanggal_lahir));
                            $tanggal = tgl_indo($date);
                            echo $pdk->tempat_lahir . ', ' . $tanggal; ?></td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td><?php echo $pdk->agama ?></td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td><?php echo $pdk->status_perkawinan ?></td>
                    </tr>
                    <tr>
                        <th>Status Dalam Keluarga</th>
                        <td><?php echo $pdk->status_dalam_keluarga ?></td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td><?php echo $pdk->pekerjaan ?></td>
                    </tr>
                    <tr>
                        <th>Kewarganegaraan</th>
                        <td><?php echo $pdk->kewarganegaraan ?></td>
                    </tr>
                    <tr>
                        <th>Golongan Darah</th>
                        <td><?php echo $pdk->gol_darah ?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td><?php echo $pdk->pendidikan_akhir ?></td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td><?php echo $pdk->nama_ayah ?></td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td><?php echo $pdk->nama_ibu ?></td>
                    </tr>
                    <tr>
                        <th>Dusun</th>
                        <td><?php echo $pdk->dusun ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $pdk->alamat ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="<?php 
            $link = $_SERVER['HTTP_REFERER'];
            echo $link;
            ?>" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-footer">
            <?php
            $hari = date('l');
            $tanggal = date('d');
            $bulan = date('F');
            $tahun = date('Y');
            $hariIndonesia = array(
                'Sunday' => 'Minggu',
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => 'Sabtu'
            );
            $bulanIndonesia = array(
                'January' => 'Januari',
                'February' => 'Februari',
                'March' => 'Maret',
                'April' => 'April',
                'May' => 'Mei',
                'June' => 'Juni',
                'July' => 'Juli',
                'August' => 'Agustus',
                'September' => 'September',
                'October' => 'Oktober',
                'November' => 'November',
                'December' => 'Desember'
            );
            $hariIndonesia = $hariIndonesia[$hari];
            $bulanIndonesia = $bulanIndonesia[$bulan];
            echo "<h6 class='text-info'> $hariIndonesia, $tanggal $bulanIndonesia $tahun </h6>";
            ?>
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