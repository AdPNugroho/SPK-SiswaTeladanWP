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
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.toast.css') ?>">
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
                            <a href="<?= base_url('dashboard') ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('WeightedProduct') ?>">
                                <i class="fa fa-question"></i> <span>Weighted Product</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        </li>
                        <li class="treeview active">
                            <a>
                                <i class="fa fa-gear"></i> <span>Kriteria</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu menu-open" style="display: block;">
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
                        Panel
                        <small>Kriteria</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href=<?= base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Kriteria</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row" id="tambahKriteria">
                        <div class="col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header">Tambah Kriteria</div>
                                <div class="box-body">
                                    <form class="form-horizontal" id="formTambah">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Kriteria</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama" name="nama_kriteria" placeholder="Nama Kriteria">                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" id="simpanKriteria">Save &nbsp; <i class="fa fa-database"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="editKriteria" hidden>
                        <div class="col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header">Edit Kriteria
                                    <button type="button" class="btn btn-danger btn-sm pull-right" id="cancelUpdate">
                                        <i class="fa fa-times"></i>
                                    </button></div>
                                <div class="box-body">
                                    <form class="form-horizontal" id="formUpdate">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">ID Kriteria</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="id_kriteria" name="id_kriteria" placeholder="Nama Kriteria" readonly>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Kriteria</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Nama Kriteria">                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-success" id="updateKriteria">Update &nbsp; <i class="fa fa-refresh"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box box-info">
                                <div class="box-header">Kriteria</div>
                                <div class="box-body" id="daftarKriteria">

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
        <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/app.min.js') ?>"></script>
        <script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jquery.toast.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                //Mencegah User Melakukan Submit Form dengan Menekan tombol enter
                $(window).keydown(function (event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
                $('#daftarKriteria').load('<?= base_url('kriteria/lihat_kriteria') ?>');
                $('#simpanKriteria').click(function () {
                    var data = $('#formTambah').serialize();
                    $.ajax({
                        url: '<?= base_url('kriteria/tambah_kriteria') ?>',
                        data: data,
                        dataType: 'json',
                        cache: false,
                        type: 'post',
                        success: function (response) {
                            $.toast({
                                heading: 'Information',
                                text: response.message,
                                position: 'bottom-right',
                                stack: false,
                                showHideTransition: 'slide',
                                icon: response.status
                            });
                        },
                        failed: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                            alert(xhr.responseText);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                            alert(xhr.responseText);
                        },
                        complete: function () {
                            $('#tambahKriteria').fadeOut(1000);
                            $('#daftarKriteria').fadeOut(1000, function () {
                                $('#nama').val("");
                                $('#daftarKriteria').load('<?= base_url('kriteria/lihat_kriteria') ?>');
                                $('#daftarKriteria').fadeIn(1000);
                                $('#tambahKriteria').fadeIn(1000);
                            });
                        }
                    });
                });
                $('#updateKriteria').click(function () {
                    var data = $('#formUpdate').serialize();
                    $.ajax({
                        url:'<?=base_url('kriteria/edit_kriteria')?>',
                        data:data,
                        type:'post',
                        dataType:'json',
                        cache:'false',
                        success: function (response) {
                            $.toast({
                                heading: 'Information',
                                text: response.message,
                                position: 'bottom-right',
                                stack: false,
                                showHideTransition: 'slide',
                                icon: response.status
                            });
                        },
                        failed: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                            alert(xhr.responseText);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                            alert(xhr.responseText);
                        },
                        complete: function () {
                            $('#editKriteria').fadeOut(1000);
                            $('#daftarKriteria').fadeOut(1000, function () {
                                $('#nama').val("");
                                $('#daftarKriteria').load('<?= base_url('kriteria/lihat_kriteria') ?>');
                                $('#daftarKriteria').fadeIn(1000);
                                $('#tambahKriteria').fadeIn(1000);
                            });
                        }
                        
                    });
                });
                $('#cancelUpdate').click(function () {
                    $('#editKriteria').fadeOut(1000, function () {
                        $('#id_kriteria').val("");
                        $('#nama_kriteria').val("");
                        $('#tambahKriteria').fadeIn(1000);
                    });
                });
            });
            $(document).on('click', '.editKriteria', function () {
                var id = $(this).attr('data-id');
                var nama = $(this).attr('data-nama');
                $('#editKriteria').fadeOut(1000, function () {
                    $('#tambahKriteria').fadeOut(1000, function () {
                        $('#id_kriteria').val(id);
                        $('#nama_kriteria').val(nama);
                        $('#editKriteria').fadeIn(1000);
                    });
                });

            });
            $(document).on('click', '.hapusKriteria', function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '<?=base_url('kriteria/hapus_kriteria')?>',
                    data: 'id_kriteria=' + id,
                    type: 'post',
                    dataType: 'json',
                    cache: false,
                    success: function (response) {
                        $.toast({
                            heading: 'Information',
                            text: response.message,
                            position: 'bottom-right',
                            stack: false,
                            showHideTransition: 'slide',
                            icon: response.status
                        });
                    },
                    failed: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        alert(xhr.responseText);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        alert(xhr.responseText);
                    },
                    complete: function () {
                        $('#daftarKriteria').fadeOut(1000, function () {
                            $('#nama').val("");
                            $('#daftarKriteria').load('<?= base_url('kriteria/lihat_kriteria') ?>');
                            $('#daftarKriteria').fadeIn(1000);
                        });
                    }
                });
            });
        </script>
    </body>
</html>
