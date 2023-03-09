<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Penduduk</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $jumlah_penduduk = $this->db->get('tb_penduduk')->num_rows();
                                echo $jumlah_penduduk . ' Jiwa';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- People Icon -->
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="<?= base_url('penduduk') ?>" class="btn btn-outline-primary btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                Total Dusun</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $jumlah_dusun = $this->db->get('tb_dusun')->num_rows();
                                echo $jumlah_dusun . ' Dusun';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- Icon city -->
                            <i class="fas fa-city fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="<?= base_url('dusun') ?>" class="btn btn-outline-success btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                Total Keluarga</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM tb_penduduk GROUP BY no_kk";
                                $jumlah_keluarga = $this->db->query($sql)->num_rows();
                                echo $jumlah_keluarga . ' Keluarga';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- Family Icon -->
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="<?= base_url('penduduk/data_keluarga') ?>" class="btn btn-outline-info btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Pesan Masuk</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $jumlah_pesan = $this->db->get('tb_pengaduan')->num_rows();
                                echo $jumlah_pesan . ' Pesan';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- Icon Message -->
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="<?= base_url('pengaduan') ?>" class="btn btn-outline-warning btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <!-- Content Row for Statistic -->

    <div class="row">
        <!-- Make accordion -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-bar"></i> Statistik Penduduk</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show animated--fade-in" id="collapseCardExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <!-- Collapsible card -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#jk" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="jk">
                                        <h6 class="m-0 font-weight-bold text-primary">Jenis Kelamin</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse animated--fade-in" id="jk">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th width="50%">Jenis Kelamin</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $kelamin = ['Laki-laki', 'Perempuan'];
                                                        foreach ($kelamin as $k) {
                                                            $this->db->where('jenis_kelamin', $k);
                                                            $jumlah = $this->db->get('tb_penduduk')->num_rows();
                                                            echo "<tr>
                                                                <td>$k</td>
                                                                <td>$jumlah</td>
                                                            </tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <!-- Collapsible card -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#agama" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="agama">
                                        <h6 class="m-0 font-weight-bold text-primary">Agama</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse animated--fade-in" id="agama">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th width="50%">Agama</th>
                                                            <th width="50%">Jumlah (Orang)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];
                                                        ?>
                                                        <?php foreach ($agama as $row) : ?>
                                                            <tr>
                                                                <td><?= $row ?></td>
                                                                <td><?= $this->db->get_where('tb_penduduk', ['agama' => $row])->num_rows() ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <!-- Collapsible card -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#pekerjaan" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="pekerjaan">
                                        <h6 class="m-0 font-weight-bold text-primary">Pekerjaan</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse animated--fade-in" id="pekerjaan">
                                        <div class="card-body">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th width="50%">Pekerjaan</th>
                                                        <th width="50%">Jumlah (Orang)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql_pekerjaan = $this->db->get('tb_pekerjaan')->result();
                                                    foreach ($sql_pekerjaan as $row) {
                                                        $this->db->where('pekerjaan', $row->id);
                                                        $jumlah = "SELECT COUNT(*) AS jumlah FROM tb_penduduk WHERE pekerjaan = '$row->nama'";
                                                        $jumlah = $this->db->query($jumlah)->row()->jumlah;
                                                        echo "<tr>
                                                                                <td>$row->nama</td>
                                                                                <td>$jumlah</td>
                                                                            </tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <!-- Collapsible card -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#pendidikan" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="pendidikan">
                                        <h6 class="m-0 font-weight-bold text-primary">Pendidikan</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse animated--fade-in" id="pendidikan">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th width="50%">Pendidikan</th>
                                                            <th width="50%">Jumlah (Orang)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $pendidikan = array('Tidak Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/SMK/Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3');
                                                        $sql = $this->db->get('tb_penduduk')->result();
                                                        foreach ($pendidikan as $row) {
                                                            $this->db->where('pendidikan_akhir', $row);
                                                            $jumlah = "SELECT COUNT(*) AS jumlah FROM tb_penduduk WHERE pendidikan_akhir = '$row'";
                                                            $jumlah = $this->db->query($jumlah)->row()->jumlah;
                                                            echo "<tr>
                                                                                <td>$row</td>
                                                                                <td>$jumlah</td>
                                                                            </tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <!-- Collapsible card -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#goldarah" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="goldarah">
                                        <h6 class="m-0 font-weight-bold text-primary">Gologan Darah</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse animated--fade-in" id="goldarah">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th width="50%">Gologan Darah</th>
                                                            <th width="50%">Jumlah (Orang)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $goldarah = array('A', 'B', 'AB', 'O');
                                                        $sql = $this->db->get('tb_penduduk')->result();
                                                        foreach ($goldarah as $row) {
                                                            $this->db->where('gol_darah', $row);
                                                            $jumlah = "SELECT COUNT(*) AS jumlah FROM tb_penduduk WHERE gol_darah = '$row'";
                                                            $jumlah = $this->db->query($jumlah)->row()->jumlah;
                                                            echo "<tr>
                                                                                <td>$row</td>
                                                                                <td>$jumlah</td>
                                                                            </tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <!-- Collapsible card -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#voter" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="voter">
                                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Eligible Voter</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse animated--fade-in" id="voter">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th width="50%">Dusun</th>
                                                            <th width="50%">Jumlah (Orang)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM tb_dusun";
                                                        $sql = $this->db->query($sql)->result();
                                                        foreach ($sql as $row) {
                                                            $sql = "SELECT * FROM tb_penduduk";
                                                            $sql = $this->db->query($sql)->result();
                                                            foreach($sql as $p){
                                                                // check if year on field tanggal_lahir is >= 17 when subtracted from current year (date('Y')) and store it in $eligible
                                                                $eligible = date('Y') - 17;
                                                                if($eligible >= 17){
                                                                    $jumlah = "SELECT COUNT(*) AS jumlah FROM tb_penduduk WHERE dusun = '$row->nama_dusun' AND YEAR(tanggal_lahir) <= '$eligible'";
                                                                    $jumlah = $this->db->query($jumlah)->row()->jumlah;
                                                                }
                                                                
                                                            }
                                                            echo "<tr>
                                                                <td>$row->nama_dusun</td>
                                                                <td>$jumlah</td>
                                                            </tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('dashboard/print_statistik') ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-print"></i> Download Statistik</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->