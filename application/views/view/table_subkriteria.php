<?php
if ($subkriteria->num_rows() > 0):
    $settings = array(
        'table_open' => '<table id="listSubkriteria" class="table table-striped table-bordered">',
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
    $this->table->set_heading($cell,'Golongan Kriteria','Nama SubKriteria',$cell2,$cell3);
    $this->table->set_template($settings);
    foreach($subkriteria->result() as $row){
        $this->table->add_row(array(
            $row->id_subkriteria,
            $row->nama_kriteria,
            $row->nama_subkriteria,
            "<a class='editSubkriteria btn btn-success btn-block' data-id_subkriteria='$row->id_subkriteria' data-id_kriteria='$row->id_kriteria' data-nama='$row->nama_subkriteria'>Edit &nbsp; <i class='glyphicon glyphicon-repeat'></i></a>",
            "<a class='hapusSubkriteria btn btn-danger btn-block' data-id_subkriteria='$row->id_subkriteria'>Hapus &nbsp; <i class='glyphicon glyphicon-trash'></i></a>"
        ));
    }
    echo $this->table->generate();
else:
    echo "<center>Tidak Ada Data </center>";
endif;