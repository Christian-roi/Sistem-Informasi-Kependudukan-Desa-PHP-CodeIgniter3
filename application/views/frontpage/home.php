<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-danger">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('home'); ?>"><img src="<?= base_url('assets/img/Lambang_Kabupaten_Deli_Serdang.png'); ?>" alt="" width="30" height="30" class="d-inline-block align-text-top"> DESA SIDOMULYO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ml-auto">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url('home'); ?>">Home</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url('home/data'); ?>">Data Penduduk</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('home/pesan'); ?>">Kotak Surat</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/login'); ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container px-4 px-lg-5 mt-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="<?= base_url('assets/img/'); ?>desa.jpg" alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Selamat Datang di Desa Sidomulyo</h1>
                <p>Desa Sidomulyo adalah salah satu desa yang ada di Kecamatan Sidomulyo, Kabupaten Deli Serdang, Sumatera Utara, Indonesia.</p>
                <a class="btn btn-primary" href="<?= base_url('home/pesan'); ?>">Hubungi Kami</a>
            </div>
        </div>
        <!-- Call to Action-->
        <!-- <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body">
                <p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p>
            </div>
        </div> -->
        <!-- Content Row-->
        <!-- <div class="row gx-4 gx-lg-5">
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card One</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Two</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Three</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- Footer-->
    <footer class="py-3 bg-dark navbar fixed-bottom">
        <div class="container px-4 px-lg-5 align-items-center justify-content-center">
            <p class="m-0 text-center text-white">Copyright &copy; 2022 Desa Sidomulyo</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- <script src="js/scripts.js"></script> -->
</body>