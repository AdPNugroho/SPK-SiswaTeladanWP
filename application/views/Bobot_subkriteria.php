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
                        <small>Bobot SubKriteria</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href=<?= base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Bobot SubKriteria</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row" id="pilihKriteria">
                        <div class="col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header">Pilih Kriteria</div>
                                <div class="box-body">
                                    <form class="form-horizontal" id="formPilihKriteria">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Kriteria</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="pilihanKriteria">
                                                    <?php
                                                    foreach ($data_kriteria->result() as $row) {
                                                        echo "<option value='" . $row->id_kriteria . "'>" . $row->id_kriteria . " - " . $row->nama_kriteria . "</option>";
                                                    }
                                                    ?>
                                                </select>                                             
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" id="btnPilihKriteria">Pilih &nbsp; <i class='glyphicon glyphicon-chevron-down'></i></button>
                                    <button type="button" class="btn btn-danger" id="resetPilihKriteria" disabled>Reset &nbsp; <i class='glyphicon glyphicon-repeat'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id='formPilihan' hidden>
                        <div class="col-lg-12">
                            <div class="box box-primary">
                                <div class="box-header">Bobot Subkriteria</div>
                                <div class="box-body">
                                    <form id="formBobotKriteria">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>Golongan Kriteria</td>
                                                    <td>Subkriteria</td>
                                                    <td>Bobot</td>
                                                </tr>
                                            </thead>
                                            <tbody id="bobotSubkriteria">

                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-success" id="updateBobotKriteria">Update &nbsp; <i class='glyphicon glyphicon-circle-arrow-right'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id='panelBobotSubKriteria' hidden>
                        <div class="col-lg-12">
                            <div class="box box-info">
                                <div class="box-header">Bobot SubKriteria</div>
                                <div class="box-body">
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <td style='width:10px'>ID</td>
                                                <td>Golongan Kriteria</td>
                                                <td>Subkriteria</td>
                                                <td style='width:50px'>Bobot</td>
                                                <td style='width:100px'>Hasil Bobot</td>
                                                <td style='width:100px'>Bobot Global</td>
                                            </tr>
                                        </thead>
                                        <tbody id="hasil_bobot_subkriteria">

                                        </tbody>
                                    </table>
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
                $('#resetPilihKriteria').click(function () {
                    $('#btnPilihKriteria').removeAttr('disabled');
                    $('#pilihanKriteria').removeAttr('disabled');
                    $('#resetPilihKriteria').attr('disabled', 'true');
                    $('#panelBobotSubKriteria').fadeOut(1000);
                    $('#formPilihan').fadeOut(1000);
                    //TODO Perbaiki Tombol Reset (DEBUG)
                    //Update
                    //View Bobot
                });
                $('#btnPilihKriteria').click(function () {
                    $('#resetPilihKriteria').removeAttr('disabled');
                    $('#btnPilihKriteria').attr('disabled', 'true');
                    $('#pilihanKriteria').attr('disabled', 'true');
                    var id_kriteria = $('#pilihanKriteria').val();
                    $('#formPilihan').fadeOut(1000, function () {
                        $('#bobotSubkriteria').empty();
                        $.ajax({
                            url: '<?= base_url('subkriteria/lihat_bobot_subkriteria') ?>',
                            data: 'id_kriteria=' + id_kriteria,
                            type: 'post',
                            dataType: 'json',
                            cache: 'false',
                            success: function (response) {
                                if (response.length > 0) {
                                    $.each(response, function (i, item) {
                                        if (item.bobot == 0) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0' selected='selected'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                                        } else if (item.bobot == 1) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1' selected='selected'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                                        } else if (item.bobot == 2) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1'>1</option><option value='2' selected='selected'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                                        } else if (item.bobot == 3) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3' selected='selected'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                                        } else if (item.bobot == 4) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4' selected='selected'>4</option><option value='5'>5</option></select>";
                                        } else if (item.bobot == 5) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5' selected='selected'>5</option></select>";
                                        }
                                        $('#bobotSubkriteria').append("<tr>\n\
                                                                        <td>" + item.id_subkriteria + "<input value='" + item.id_subkriteria + "' type='hidden' class='form-control' name='id_subkriteria[]' readonly></td>\n\
                                                                        <td>" + item.nama_kriteria + "</td>\n\
                                                                        <td>" + item.nama_subkriteria + "</td>\n\
                                                                        <td>" + select + "</td>\n\
                                                                    </tr>");
                                    });
                                } else {
                                    $('#bobotSubkriteria').append("<tr><td colspan='4'><center>Tidak Ada Data SubKriteria Dengan Kriteria Ini</center></td></tr>");
                                }
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
                                $('#formPilihan').fadeIn(1000);
                                $('#panelBobotSubKriteria').fadeOut(1000, function () {
                                    $('#hasil_bobot_subkriteria').empty();
                                    view_bobot(id_kriteria);
                                    $('#panelBobotSubKriteria').fadeIn(1000);
                                });
                            }
                        });
                    });
                });
                $('#updateBobotKriteria').click(function () {
                    var data = $('#formBobotKriteria').serialize();
                    var id_kriteria = $('#pilihanKriteria').val();
                    console.log(data+"&id_kriteria="+id_kriteria);
                    $.ajax({
                        url: '<?= base_url('subkriteria/simpan_bobot_subkriteria') ?>',
                        data: data +"&id_kriteria="+id_kriteria,
                        type: 'post',
                        dataType: 'json',
                        cache: 'false',
                        success: function (response) {
                            console.log(response);
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
                            $('#panelBobotSubKriteria').fadeOut(1000, function () {
                                $('#hasil_bobot_subkriteria').empty();
                                view_bobot(id_kriteria);
                                $('#panelBobotSubKriteria').fadeIn(1000);
                            });
                        }
                    });
                });
            });
            function view_bobot(id_kriteria) {
                $.ajax({
                    url: '<?= base_url('subkriteria/lihat_bobot_subkriteria') ?>',
                    data: 'id_kriteria=' + id_kriteria,
                    dataType: 'json',
                    type: 'post',
                    cache: false,
                    success: function (response) {
                        if (response.length > 0) {
                            $.each(response, function (i, item) {
                                $('#hasil_bobot_subkriteria').append("<tr>\n\
                                                                        <td>" + item.id_subkriteria + "</td>\n\
                                                                        <td>" + item.nama_kriteria + "</td>\n\
                                                                        <td>" + item.nama_subkriteria + "</td>\n\
                                                                        <td>" + item.bobot + "</td>\n\
                                                                        <td>" + item.hasil_bobot + "</td>\n\
                                                                        <td>" + item.bobot_global + "</td>\n\
                                                                    </tr>");
                            });
                        } else {
                            $('#hasil_bobot_subkriteria').append("<tr><td colspan='4'><center>Tidak Ada Data SubKriteria Dengan Kriteria Ini</center></td></tr>");
                        }
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
            }
        </script>
    </body>
</html>
