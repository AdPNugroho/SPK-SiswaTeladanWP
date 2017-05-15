<?php
if ($kriteria->num_rows() > 0):
    $settings = array(
        'table_open' => '<table id="listKriteria" class="table table-striped table-bordered">',
    );
    $cell = array(
        'data'=>'ID',
        'style'=>'width:10px'
    );
    $cell2 = array(
        'data'=>'Edit',
        'style'=>'width:10px'
    );
    $cell3 = array(
        'data'=>'Hapus',
        'style'=>'width:10px'
    );
    $this->table->set_heading($cell,'Nama Kriteria',$cell2,$cell3);
    $this->table->set_template($settings);
    foreach($kriteria->result() as $row){
        $this->table->add_row(array(
            $row->id_kriteria,
            $row->nama_kriteria,
            "<a class='editKriteria btn btn-success btn-block' data-id='$row->id_kriteria' data-nama='$row->nama_kriteria'>Edit &nbsp; <i class='glyphicon glyphicon-repeat'></i></a>",
            "<a class='hapusKriteria btn btn-danger btn-block' data-id='$row->id_kriteria'>Hapus &nbsp; <i class='glyphicon glyphicon-trash'></i></a>"
        ));
    }
    echo $this->table->generate();
else:
    echo "<center>Tidak Ada Data Kriteria</center>";
endif;