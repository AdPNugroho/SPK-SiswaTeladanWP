<?php
if ($bobot->num_rows() > 0):
    $settings = array(
        'table_open' => '<table id="listKriteria" class="table table-striped table-bordered">',
    );
    $cell1 = array(
        'data'=>'ID',
        'style'=>'width:10px'
    );
    $cell2 = array(
        'data'=>'Bobot',
        'style'=>'width:10px'
    );
    $this->table->set_heading($cell1,'Nama Kriteria',$cell2,'Hasil Perhitungan');
    $this->table->set_template($settings);
    foreach($bobot->result() as $row){
        $this->table->add_row(array(
            $row->id_kriteria,
            $row->nama_kriteria,
            $row->bobot,
            $row->hasil_bobot
        ));
    }
    echo $this->table->generate();
else:
    echo "<center>Tidak Ada Data Kriteria</center>";
endif;