<?php
if ($alternatif->num_rows() > 0):
    $settings = array(
        'table_open' => '<table id="listAlternatif" class="table table-striped table-bordered">',
    );
    $cell = array(
        'data'=>'NIS',
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
    $this->table->set_heading($cell,'Nama','Alamat','Tempat Lahir','Tanggal Lahir',$cell2,$cell3);
    $this->table->set_template($settings);
    foreach($alternatif->result() as $row){
        $this->table->add_row(array(
            $row->nis,
            $row->nama_siswa,
            $row->alamat,
            $row->tempat_lahir,
            $row->tanggal_lahir,
            "<a class='editAlternatif btn btn-success btn-block' data-nis='$row->nis' data-nama='$row->nama_siswa' data-alamat='$row->alamat' data-pob='$row->tempat_lahir' data-dob='$row->tanggal_lahir'>Edit &nbsp; <i class='glyphicon glyphicon-repeat'></i></a>",
            "<a class='hapusAlternatif btn btn-danger btn-block' data-nis='$row->nis'>Hapus &nbsp; <i class='glyphicon glyphicon-trash'></i></a>"
        ));
    }
    echo $this->table->generate();
else:
    $this->table->add_row('Tidak Ada Data');
    $this->table->generate();
endif;