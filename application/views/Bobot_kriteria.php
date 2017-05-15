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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header">Bobot Kriteria
                                    <button type="button" class="btn btn-danger btn-sm pull-right" id="cancelUpdate">
                                        <i class="fa fa-times"></i>
                                    </button></div>
                                <div class="box-body">
                                    <form id="formBobotKriteria" action="<?= base_url('kriteria/simpan_bobot') ?>" method="post">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>Kriteria</td>
                                                    <td>Bobot</td>
                                                </tr>
                                            </thead>
                                            <tbody id="bobotKriteria">

                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-success" id="updateBobotKriteria">Update &nbsp; <i class="glyphicon glyphicon-chevron-right"></i></button>
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
                $('#daftarKriteria').load('<?= base_url('kriteria/lihat_bobot_kriteria') ?>');
                $.ajax({
                    url: '<?= base_url('kriteria/json_kriteria') ?>',
                    type: 'post',
                    dataType: 'json',
                    cache: false,
                    success: function (response) {
                        $.each(response, function (i, item) {
                            if (item.bobot == 0) {
                                var select = "<select class='form-control' name='bobotkriteria[]'><option value='0' selected='selected'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                            } else if (item.bobot == 1) {
                                var select = "<select class='form-control' name='bobotkriteria[]'><option value='0'>0</option><option value='1' selected='selected'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                            } else if (item.bobot == 2) {
                                var select = "<select class='form-control' name='bobotkriteria[]'><option value='0'>0</option><option value='1'>1</option><option value='2' selected='selected'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                            } else if (item.bobot == 3) {
                                var select = "<select class='form-control' name='bobotkriteria[]'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3' selected='selected'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                            } else if (item.bobot == 4) {
                                var select = "<select class='form-control' name='bobotkriteria[]'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4' selected='selected'>4</option><option value='5'>5</option></select>";
                            } else if (item.bobot == 5) {
                                var select = "<select class='form-control' name='bobotkriteria[]'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5' selected='selected'>5</option></select>";
                            }
                            $('#bobotKriteria').append("<tr>\n\
                                                                        <td>" + item.id_kriteria + "<input value='" + item.id_kriteria + "' type='hidden' class='form-control' name='id_kriteria[]' readonly></td>\n\
                                                                        <td>" + item.nama_kriteria + "</td>\n\
                                                                        <td>" + select + "</td>\n\
                                                                    </tr>");
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
                    }
                });
                $('#updateBobotKriteria').click(function () {
                    var data = $('#formBobotKriteria').serialize();
                    $.ajax({
                        url: '<?= base_url('kriteria/simpan_bobot') ?>',
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
                            $('#daftarKriteria').load('<?= base_url('kriteria/lihat_bobot_kriteria') ?>');
                        }

                    });
                });
            });
        </script>
    </body>
</html>
