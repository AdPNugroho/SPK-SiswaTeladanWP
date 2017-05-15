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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-primary">
                                <div class="box-header">Daftar Alternatif</div>
                                <div class="box-body" id="daftarAlternatif">
                                    <form class="form-horizontal" id="formTambah">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Kriteria</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id='id_kriteria' name="id_kriteria">
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
                                <div class='box-footer'>
                                    <button type="button" class="btn btn-primary" id="pilihKriteriaEvaluasi">Pilih Kriteria Evaluasi &nbsp; <i class='glyphicon glyphicon-chevron-down'></i></button>
                                    <button type="button" class="btn btn-danger" id="resetPilihan" disabled>Reset &nbsp; <i class='glyphicon glyphicon-repeat'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id='panelEditEvaluasi' hidden>
                        <div class="col-lg-6">
                            <div class="box box-info">
                                <div class="box-header">Data Evaluasi Alternatif</div>
                                <div class="box-body">
                                    <form class="form-horizontal" id="formEditEvaluasi">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                                <tr>
                                                    <td style="width: 10%;">ID Subkriteria</td>
                                                    <td>Subkriteria</td>
                                                    <td style="width: 15%;">Nilai Evaluasi</td>
                                                </tr>
                                            </thead>
                                            <tbody id="dataEvaluasi">

                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary btn-sm" id="updateDataEvaluasi">Update &nbsp; <i class='glyphicon glyphicon-chevron-right'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id='panelNilaiAlternatif' hidden>
                        <div class="col-lg-12">
                            <div class="box box-info">
                                <div class="box-header">Data Evaluasi Alternatif</div>
                                <div class="box-body">
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr id='heading'>

                                            </tr>
                                        </thead>
                                        <tbody id="hasilNilaiAlternatif">

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
                $('#pilihKriteriaEvaluasi').click(function () {
                    var id_kriteria = $('#id_kriteria').val();
                    var subkriteria, nilai, nilai_siswa;
                    $('#resetPilihan').removeAttr('disabled');
                    $('#pilihKriteriaEvaluasi').attr('disabled','true');
                    $.ajax({
                        url: '<?= base_url('alternatif/daftar_evaluasi') ?>',
                        data: 'id_kriteria=' + id_kriteria,
                        cache: false,
                        dataType: 'json',
                        type: 'post',
                        success: function (response) {
                            $('#heading').empty();
                            $('#heading').append('<td>NIS</td>');
                            $('#heading').append('<td>Nama Siswa</td>');
                            $('#hasilNilaiAlternatif').empty();
                            var x, y, z;
                            console.log(response);
                            subkriteria = response.data_kriteria;
                            nilai = response.data_nilai;
                            for (x = 0; x < subkriteria.length; x++) {
                                $('#heading').append('<td>' + subkriteria[x].nama_subkriteria + '</td>');
                            }
                            $('#heading').append('<td>Edit</td>');
                            for (y = 0; y < nilai.length; y++) {
                                var output = "";
                                output += '<tr><td>' + nilai[y].nis + '</td><td>' + nilai[y].nama + '</td>';
                                nilai_siswa = nilai[y].nilai_siswa;
                                for (z = 0; z < nilai_siswa.length; z++) {
                                    output += '<td>' + nilai_siswa[z].nilai + '</td>';
                                }
                                output += "<td><button class='editNilai btn btn-success' dt-nis='" + nilai[y].nis + "'>Edit &nbsp; <i class='glyphicon glyphicon-refresh'></i></button></td></tr>";
                                console.log(output);
                                $('#hasilNilaiAlternatif').append(output);
                            }
                        },
                        complete: function () {
                            $('#panelNilaiAlternatif').fadeIn(1000);
                        }
                    });
                });
                $('#updateDataEvaluasi').click(function () {
                    var data = $('#formEditEvaluasi').serialize();
                    $.ajax({
                        type: 'post',
                        data: data,
                        dataType: 'json',
                        cache: false,
                        url: '<?= base_url('alternatif/simpan_edit') ?>',
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
                            $('#panelEditEvaluasi').fadeOut(1000);
                            $('#panelNilaiAlternatif').fadeOut(1000);
                            var id_kriteria = $('#id_kriteria').val();
                            var subkriteria, nilai, nilai_siswa;
                            $.ajax({
                                url: '<?= base_url('alternatif/daftar_evaluasi') ?>',
                                data: 'id_kriteria=' + id_kriteria,
                                cache: false,
                                dataType: 'json',
                                type: 'post',
                                success: function (response) {
                                    $('#heading').empty();
                                    $('#heading').append('<td>NIS</td>');
                                    $('#heading').append('<td>Nama Siswa</td>');
                                    $('#hasilNilaiAlternatif').empty();
                                    var x, y, z;
                                    console.log(response);
                                    subkriteria = response.data_kriteria;
                                    nilai = response.data_nilai;
                                    for (x = 0; x < subkriteria.length; x++) {
                                        $('#heading').append('<td>' + subkriteria[x].nama_subkriteria + '</td>');
                                    }
                                    $('#heading').append('<td>Edit</td>');
                                    for (y = 0; y < nilai.length; y++) {
                                        var output = "";
                                        output += '<tr><td>' + nilai[y].nis + '</td><td>' + nilai[y].nama + '</td>';
                                        nilai_siswa = nilai[y].nilai_siswa;
                                        for (z = 0; z < nilai_siswa.length; z++) {
                                            output += '<td>' + nilai_siswa[z].nilai + '</td>';
                                        }
                                        output += "<td><button class='editNilai btn btn-success' dt-nis='" + nilai[y].nis + "'>Edit</button></td></tr>";
                                        console.log(output);
                                        $('#hasilNilaiAlternatif').append(output);
                                    }
                                },
                                complete: function () {
                                    $('#panelNilaiAlternatif').fadeIn(1000);
                                }
                            });
                        }

                    });
                });
                $('#resetPilihan').click(function(){
                    $('#panelEditEvaluasi').fadeOut(1000);
                    $('#panelNilaiAlternatif').fadeOut(1000);
                    $('#pilihKriteriaEvaluasi').removeAttr('disabled');
                    $('#resetPilihan').attr('disabled','true');
                    
                });
            });
            $(document).on('click', '.editNilai', function () {
                var output;
                var nis = $(this).attr("dt-nis");
                var id_kriteria = $('#id_kriteria').val();
                console.log(nis);
                $.ajax({
                    type: 'post',
                    data: 'nis=' + nis + '&id_kriteria=' + id_kriteria,
                    dataType: 'json',
                    cache: 'false',
                    url: '<?= base_url('alternatif/data_edit') ?>',
                    success: function (response) {
                        console.log(response);
                        $.each(response, function (i, item) {
                            $('#dataEvaluasi').empty();
                            output += "<tr>";
                            output += "<td><input class='form-control' type='hidden' value='" + item.id_evaluasi + "' name='id_evaluasi[]'>" + item.id_subkriteria + "</td>";
                            output += "<td>" + item.nama_subkriteria + "</td>";
                            output += "<td><input class='form-control' type='number' value='" + item.nilai + "' name='nilai_evaluasi[]'></td>";
                            output += "</tr>";
                        });
                        $('#dataEvaluasi').append(output);
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
                        $('#panelEditEvaluasi').fadeIn(1000);
                    }
                });
                //TODO TOMBOL EDIT AJAX SHOW FORM
            });
        </script>
    </body>
</html>
