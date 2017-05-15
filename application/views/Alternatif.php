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
                        <li class="treeview active">
                            <a>
                                <i class="fa fa-user"></i> <span>Alternatif</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu menu-open" style="display: block;">
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
                        <small>Alternatif</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Alternatif</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row" id="tambahAlternatif">
                        <div class="col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header">Tambah Alternatif</div>
                                <div class="box-body">
                                    <form class="form-horizontal" id="formTambah">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">NIS</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS Siswa">                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa">                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Siswa">                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">POB</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="pob" name="pob" placeholder="Tempat Lahir Siswa">                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">DOB</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Tanggal Lahir Siswa">                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" id="simpanAlternatif">Save &nbsp; <i class='glyphicon glyphicon-circle-arrow-right'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="editAlternatif" hidden>
                        <div class="col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header">Edit Alternatif
                                    <button type="button" class="btn btn-danger btn-sm pull-right" id="cancelUpdate">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <div class="box-body">
                                    <form class="form-horizontal" id="formUpdate">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">NIS</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nis_edit" name="nis" placeholder="NIS Siswa" readonly>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_edit" name="nama" placeholder="Nama Siswa">                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="alamat_edit" name="alamat" placeholder="Alamat Siswa">                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">POB</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="pob_edit" name="pob" placeholder="Tempat Lahir Siswa">                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">DOB</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="dob_edit" name="dob" placeholder="Tanggal Lahir Siswa">                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-success" id="updateAlternatif">Update &nbsp; <i class='glyphicon glyphicon-refresh'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box box-primary">
                                <div class="box-header">Daftar Alternatif</div>
                                <div class="box-body" id="daftarAlternatif">

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
                //Reload Data Table
                $('#daftarAlternatif').load('<?= base_url('alternatif/lihat_alternatif') ?>');
                //Jika Tombol Close Update Ditekan
                $('#cancelUpdate').click(function () {
                    console.log('test');
                    $('#editAlternatif').fadeOut(1000, function () {
                        $('#tambahAlternatif').fadeIn();
                    });
                });
                //Tombol Simpan Alternatif
                $('#simpanAlternatif').click(function () {
                    var data = $('#formTambah').serialize();
                    $.ajax({
                        url: '<?= base_url('alternatif/tambah_alternatif') ?>',
                        data: data,
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
                            //Mengosongkan isi Field Form
                            $('#tambahAlternatif').fadeOut(1000, function () {
                                $('#nis').val("");
                                $('#nama').val("");
                                $('#alamat').val("");
                                $('#pob').val("");
                                $('#dob').val("");
                                $('#tambahAlternatif').fadeIn(1000);
                            });
                            //Reload Data Table
                            //Load Table
                            $('#daftarAlternatif').load('<?= base_url('alternatif/lihat_alternatif') ?>');
                        }
                    });
                });
                //Tombol Update Alternatif
                $('#updateAlternatif').click(function () {
                    var data = $('#formUpdate').serialize();
                    $.ajax({
                        url: '<?= base_url('alternatif/edit_alternatif') ?>',
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
                            $('#editAlternatif').fadeOut(1000, function () {
                                //Isi value input data dari variabel DOM
                                $('#nis_edit').val("");
                                $('#nama_edit').val("");
                                $('#alamat_edit').val("");
                                $('#pob_edit').val("");
                                $('#dob_edit').val("");
                                //Tampilkan panel Edit Alternatif
                                $('#tambahAlternatif').fadeIn(1000);
                            });
                            //Reload Data Table
                            $('#listAlternatif').fadeOut(1000, function () {
                                //Load Table
                                $('#daftarAlternatif').load('<?= base_url('alternatif/lihat_alternatif') ?>', function () {
                                    //Jika Sudah Terload, Tampilkan Tabel
                                    $('#listAlternatif').fadeIn(1000);
                                });
                            });
                        }
                    });
                });
            });
            //Jika tombol edit ditable diklik
            $(document).on('click', '.editAlternatif', function () {
                //Ambil data DOM dan simpan di variabel
                var nis = $(this).attr('data-nis');
                var nama = $(this).attr('data-nama');
                var alamat = $(this).attr('data-alamat');
                var pob = $(this).attr('data-pob');
                var dob = $(this).attr('data-dob');
                //Hide Panel TambahALternatif
                $('#tambahAlternatif').fadeOut(1000, function () {
                    //Hide Panel Edit Alternatif
                    $('#editAlternatif').fadeOut(1000, function () {
                        //Isi value input data dari variabel DOM
                        $('#nis_edit').val(nis);
                        $('#nama_edit').val(nama);
                        $('#alamat_edit').val(alamat);
                        $('#pob_edit').val(pob);
                        $('#dob_edit').val(dob);
                        //Tampilkan panel Edit Alternatif
                        $('#editAlternatif').fadeIn(1000);
                    });
                });
            });
            $(document).on('click', '.hapusAlternatif', function () {
                var nis = $(this).attr('data-nis');
                $.ajax({
                    url: '<?= base_url('alternatif/hapus_alternatif') ?>',
                    data: 'nis=' + nis,
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
                        //Reload Data Table
                        $('#listAlternatif').fadeOut(1000, function () {
                            //Load Table
                            $('#daftarAlternatif').load('<?= base_url('alternatif/lihat_alternatif') ?>', function () {
                                //Jika Sudah Terload, Tampilkan Tabel
                                $('#listAlternatif').fadeIn(1000);
                            });
                        });
                    }
                });
            });
        </script>
    </body>
</html>
