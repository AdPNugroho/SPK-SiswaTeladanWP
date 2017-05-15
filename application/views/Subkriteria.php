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
                        <li class="treeview active">
                            <a>
                                <i class="fa fa-refresh"></i> <span>SubKriteria</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu menu-open" style="display: block;">
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
                        <small>SubKriteria</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href=<?= base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">SubKriteria</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row" id="tambahSubkriteria">
                        <div class="col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header">Tambah SubKriteria</div>
                                <div class="box-body">
                                    <form class="form-horizontal" id="formTambah">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Kriteria</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id='tambah_id' name="id_kriteria">
                                                    <?php
                                                    foreach ($data_kriteria->result() as $row) {
                                                        echo "<option value='" . $row->id_kriteria . "'>" . $row->id_kriteria . " - " . $row->nama_kriteria . "</option>";
                                                    }
                                                    ?>
                                                </select>                                             
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Kriteria</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama_subkriteria" placeholder="Nama SubKriteria" id='tambah_nama'>                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" id="simpanSubkriteria">Simpan &nbsp; <i class="glyphicon glyphicon-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="updateSubkriteria" hidden>
                        <div class="col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header">Update SubKriteria
                                    <button type="button" class="btn btn-danger btn-sm pull-right" id="cancelUpdate">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <div class="box-body">
                                    <form class="form-horizontal" id="formUpdate">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">ID Subkriteria</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="id_subkriteria" name="id_subkriteria" placeholder="Nama SubKriteria" readonly>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Kriteria</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="id_kriteria" id="id_kriteria">
                                                    <?php
                                                    foreach ($data_kriteria->result() as $row) {
                                                        echo "<option value='" . $row->id_kriteria . "'>" . $row->id_kriteria . " - " . $row->nama_kriteria . "</option>";
                                                    }
                                                    ?>
                                                </select>                                             
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Subkriteria</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_subkriteria" name="nama_subkriteria" placeholder="Nama SubKriteria">                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-success" id="editSubkriteria">Update &nbsp; <i class="glyphicon glyphicon-refresh"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box box-info">
                                <div class="box-header">SubKriteria</div>
                                <div class="box-body" id="daftarSubkriteria">
                                    Info WP
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
                $('#daftarSubkriteria').load('<?= base_url('subkriteria/lihat_subkriteria') ?>');
                $('#simpanSubkriteria').click(function () {
                    var data = $('#formTambah').serialize();
                    $.ajax({
                        url: '<?= base_url('subkriteria/tambah_subkriteria') ?>',
                        data: data,
                        type: 'post',
                        cache: false,
                        dataType: 'json',
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
                            $('#tambahSubkriteria').fadeOut(1000, function () {
                                $('#tambah_nama').val('');
                                $('#daftarSubkriteria').load('<?= base_url('subkriteria/lihat_subkriteria') ?>');
                                $('#tambahSubkriteria').fadeIn(1000);
                            });
                        }
                    });
                });
                $('#editSubkriteria').click(function () {
                    var data = $('#formUpdate').serialize();
                    $.ajax({
                        url: '<?=base_url('subkriteria/edit_subkriteria')?>',
                        data: data,
                        type: 'post',
                        cache: false,
                        dataType: 'json',
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
                            $('#updateSubkriteria').fadeOut(1000, function () {
                                $('#tambah_nama').val('');
                                $('#daftarSubkriteria').load('<?= base_url('subkriteria/lihat_subkriteria') ?>');
                                $('#tambahSubkriteria').fadeIn(1000);
                            });
                        }

                    });
                });
                $('#cancelUpdate').click(function () {
                    $('#updateSubkriteria').fadeOut(1000, function () {
                        $('#tambahSubkriteria').fadeIn(1000);
                    });
                });
            });
            $(document).on('click', '.editSubkriteria', function () {
                var id_subkriteria = $(this).attr('data-id_subkriteria');
                var id_kriteria = $(this).attr('data-id_kriteria');
                var nama = $(this).attr('data-nama');
                console.log(id_subkriteria + " " + id_kriteria + " " + nama);
                $('#tambahSubkriteria').fadeOut(1000, function () {
                    $('#updateSubkriteria').fadeOut(1000, function () {
                        $('#id_subkriteria').val(id_subkriteria);
                        $('#id_kriteria').val(id_kriteria);
                        $('#nama_subkriteria').val(nama);
                        $('#updateSubkriteria').fadeIn(1000);
                    });
                });
            });
            $(document).on('click', '.hapusSubkriteria', function () {
                var id_subkriteria = $(this).attr('data-id_subkriteria');
                $.ajax({
                    url: '<?= base_url('subkriteria/hapus_subkriteria') ?>',
                    data: 'id_subkriteria=' + id_subkriteria,
                    type: 'post',
                    dataType: 'json',
                    cache: 'false',
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
                        $('#listSubkriteria').fadeOut(1000, function () {
                            $('#daftarSubkriteria').load('<?= base_url('subkriteria/lihat_subkriteria') ?>');
                            $('#listSubkriteria').fadeIn(1000);
                        });
                    }
                });
            });
        </script>
    </body>
</html>
