<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard App SPK Siswa Teladan</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/skins/_all-skins.min.css') ?>">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>S</b>PK</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>SPK Siswa Teladan</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="<?= base_url('dashboard') ?>" >
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?= base_url('WeightedProduct') ?>">
                                <i class="fa fa-question"></i> <span>Weighted Product</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a>
                                <i class="fa fa-gear"></i> <span>Kriteria</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu menu-open" style="display: none;">
                                <li><a href="<?= base_url('kriteria') ?>"><i class="fa fa-circle-o"></i> Data Kriteria</a></li>
                                <li><a href="<?= base_url('kriteria/bobot_kriteria') ?>"><i class="fa fa-circle-o"></i> Bobot Kriteria</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a>
                                <i class="fa fa-refresh"></i> <span>SubKriteria</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu menu-open" style="display: none;">
                                <li><a href="<?= base_url('subkriteria') ?>"><i class="fa fa-circle-o"></i> Data Subkriteria</a></li>
                                <li><a href="<?= base_url('subkriteria/bobot_subkriteria') ?>"><i class="fa fa-circle-o"></i> Bobot Subkriteria</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a>
                                <i class="fa fa-user"></i> <span>Alternatif</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu menu-open" style="display: none;">
                                <li><a href="<?= base_url('alternatif') ?>"><i class="fa fa-circle-o"></i> Data Alternatif</a></li>
                                <li><a href="<?= base_url('alternatif/evaluasi') ?>"><i class="fa fa-circle-o"></i> Evaluasi Alternatif</a></li>
                                <li><a href="<?= base_url('alternatif/calculate') ?>"><i class="fa fa-circle-o"></i> Hasil WP Alternatif</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Info
                        <small>Weighted Product</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href=<?= base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Weighted Product</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box box-info">
                                <div class="box-header">Weighted Product</div>
                                <div class="box-body">
                                    <p>
 Menurut Sianturi Ingot Seen “Metode Weighted Product (WP) merupakan salah satu metode yang digunakan untuk menyelesaikan masalah. 
 <br>Metode Weighted Product (WP) menggunakan perkalian untuk menghubungkan nilai atribut (kriteria), 
 dimana nilai setiap atribut harus dipangkatkan dulu dengan bobot atribut (kriteria) yang bersangkutan. 
                                    </p>
                                    <p>
 Menurut Putra Jaya “Metode Weighted Product memerlukan proses normalisasi karena metode ini mengaluhkan hasil penilaian setiap atribut. 
 Hasil perkalian tersebut belum bermakna jika belum dibandingkan (dibagi) dengan nilai standar. 
 Bobot untuk atribut manfaat berfungsi sebagai pangkat positif dalam proses perkalian, sementara bobot biaya berfungsi sebagai pangkat negatif. 
 Metode Weighted Product menggunakan perkalian sebagai untung menghubungkan rating atribut, dimana rating setiap atribut harus dipangkatkan dulu dengan bobot yang bersangkutan. 
 Proses ini sama halnya dengan proses normalisasi 
                                    </p>
 Dengan i= 1 , 2, ...m dan j= 1, 2, ...n. 
                                    <br>
 Keterangan: 
 Π = product 
 Si = skor / nilai dari setiap alternatif 
 Xij = nilai alternatif ke- i terhadap atribut ke- j 
 wj = bobot dari setiap atribut 
                                    <br>
 Dimana(1) adalah pangkat bernilai positif untuk atribut keuntungan dan bernilai negatif untuk atribut biaya. 
 Untuk perangkingan / mencari alternatif yang terbaik dilakukan dengan rumus berikut:
 Penentuan nilai bobot W 
                                    <pre>
 Wj = Wj/SUM(Wj)
                                    </pre>
 Penentuan nilai Vektor S 
                                    <pre>
 S = (Wij^W)+(Winj^Wn)
                                    </pre>
 Penentuan nilai Vektor V 
                                    <pre>
 Vjn = Si/SUM(Si)
                                    </pre>
                                    <pre>
 Dimana : 
 V 	= Preferensi alternatif dianalogikan sebagai vektor V 
 W	= Bobot kriteria / subkriteria 
 j 	= Kriteria 
 i 	= Alternatif 
 n 	= Banyaknya kriteria 
 S 	= Preferensi alternatif dianalogikan sebagai vektor S
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2017 <a href="http://github.com/AdPNugroho">STMIK STIKOM Balikpapan</a>.</strong> 
            </footer>
        </div>
        <script src="<?= base_url('assets/js/jquery-2.2.4.js') ?>"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/app.min.js') ?>"></script>
    </body>
</html>
