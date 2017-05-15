<?php

class Model_alternatif extends CI_Model {
    public function tambah_alternatif($data) {
        //Cek apakah ada Siswa dengan NIS sama
        $filter = $this->db->select('*')->from('tbl_alternatif')->where('nis', $data['nis'])->get()->num_rows();
        //Jika Tidak Ditemukan Baris Result
        if ($filter < 1) {
            //Memasukkan Data kedalam database
            $insert = $this->db->insert('tbl_alternatif', $data);
            //Seleksi apakah berhasil input
            if ($insert) {
                $subkriteria = $this->db->get('tbl_subkriteria');
                if ($subkriteria->num_rows() > 0) {
                    $data_subkriteria = array();
                    foreach ($subkriteria->result() as $row) {
                        $x = array(
                            'nis' => $data['nis'],
                            'id_subkriteria' => $row->id_subkriteria
                        );
                        $data_subkriteria[] = $x;
                    }
                    $batch_insert = $this->db->insert_batch('tbl_evaluasi', $data_subkriteria);
                    if ($batch_insert) {
                        //Pesan Response
                        $response = array('status' => 'success', 'message' => 'Data Alternatif Berhasil Di Input');
                        return json_encode($response);
                    } else {
                        //Pesan Response
                        $response = array('status' => 'error', 'message' => 'Telah Terjadi Kesalahan');
                        return json_encode($response);
                    }
                } else {
                    //Pesan Response
                    $response = array('status' => 'success', 'message' => 'Data Alternatif Berhasil Di Input');
                    return json_encode($response);
                }
                //Jika Gagal
            } else {
                //Pesan Response
                $response = array('status' => 'error', 'message' => 'Telah Terjadi Kesalahan');
                return json_encode($response);
            }
            //Jika ditemukan baris result
        } else {
            $response = array('status' => 'failed', 'message' => 'Sudah ada Alternatif dengan NIS yang sama');
            return json_encode($response);
        }
    }
    //Fungsi Lihat Data Alternatif
    public function lihat_alternatif() {
        return $this->db->get('tbl_alternatif');
    }
    public function edit_alternatif($data) {
        //Lakukan Update Data
        $check = $this->db->set($data)->where('nis', $data['nis'])->update('tbl_alternatif');
        //Validasi apakah berhasil mengupdate Data
        if ($check) {
            //Pesan Response
            $response = array(
                'status' => 'success',
                'message' => 'Data Alternatif Berhasil Di Edit'
            );
            return json_encode($response);
            //Jika Gagal Mengupdate Data
        } else {
            //Pesan Response
            $response = array(
                'status' => 'error',
                'message' => 'Telah Terjadi kesalahan'
            );
            return json_encode($response);
        }
    }
    public function hapus_alternatif($data) {
        //Hapus Data Alternatif
        $check = $this->db->delete('tbl_alternatif', array('nis' => $data['nis']));
        //Check jika telah berhasil menghapus alternatif
        if ($check) {
            //Pesan Response
            $response = array(
                'status' => 'success',
                'message' => 'Data Alternatif Berhasil Di Hapus'
            );
            return json_encode($response);
            //Jika Gagal Menghapus Alternatif
        } else {
            //Pesan Response
            $response = array(
                'status' => 'error',
                'message' => 'Telah Terjadi kesalahan'
            );
            return json_encode($response);
        }
    }
    public function count_alternatif(){
        return $this->db->count_all('tbl_alternatif');
    }
    public function data_edit($data){
        $this->db->select('*');
        $this->db->from('tbl_evaluasi');
        $this->db->join('tbl_subkriteria','tbl_evaluasi.id_subkriteria=tbl_subkriteria.id_subkriteria');
        $this->db->where('tbl_subkriteria.id_kriteria',$data['id_kriteria']);
        $this->db->where('tbl_evaluasi.nis',$data['nis']);
        return $this->db->get();
    }
    public function simpan_edit($data){
        for($x=0;$x<count($data['id_evaluasi']);$x++){
            $insert = array(
                'nilai'=>$data['nilai'][$x]
            );
            $check = $this->db->set($insert)->where('id_evaluasi',$data['id_evaluasi'][$x])->update('tbl_evaluasi');
            if($check){
                $status=TRUE;
            }else{
                $status=FALSE;
            }
        }
        if ($status) {
            //Pesan Response
            $response = array(
                'status' => 'info',
                'message' => 'Data Evaluasi Telah Disimpan'
            );
            return json_encode($response);
        } else {
            //Pesan Response
            $response = array(
                'status' => 'error',
                'message' => 'Telah Terjadi kesalahan'
            );
            return json_encode($response);
        }
    }
    
    public function data_calc_missCalc(){
        //Variabel JSON Data
        $data_json = array();
        $data_kriteria = array();
        $data_subkriteria = array();
        $data_bobot_kriteria = array();
        $data_bobot_subkriteria = array();
        //Ambil Data Siswa
        $tbl_alternatif = $this->db->get('tbl_alternatif');
        //Ambil Data Kriteria
        $tbl_kriteria = $this->db->get('tbl_kriteria');
        foreach($tbl_kriteria->result() as $bobot_kriteria){
            $data_bobot_kriteria[$bobot_kriteria->id_kriteria]=$bobot_kriteria->hasil_bobot;
        }
        
        foreach($tbl_kriteria->result() as $bobot_kriteria){
            $data_id_kriteria[]=$bobot_kriteria->id_kriteria;
        }
        //Ambil Data Bobot
        $tbl_subkriteria = $this->db->get('tbl_subkriteria');
        foreach($tbl_subkriteria->result() as $bobot_subkriteria){
            $data_bobot_subkriteria[$bobot_subkriteria->id_subkriteria]=$bobot_subkriteria->hasil_bobot;
        }
        $x=0;
        foreach($tbl_alternatif->result() as $row_alternatif){
            $data_json[$x]['nis']=$row_alternatif->nis;
            $data_json[$x]['nama']=$row_alternatif->nama_siswa;
            foreach($tbl_kriteria->result() as $row_kriteria){
                $this->db->select('*');
                $this->db->from('tbl_evaluasi');
                $this->db->join('tbl_subkriteria','tbl_evaluasi.id_subkriteria=tbl_subkriteria.id_subkriteria');
                $this->db->join('tbl_kriteria','tbl_subkriteria.id_kriteria=tbl_kriteria.id_kriteria');
                $this->db->where('tbl_kriteria.id_kriteria',$row_kriteria->id_kriteria);
                $this->db->where('tbl_evaluasi.nis',$row_alternatif->nis);
                $data_nilai_evaluasi = $this->db->get();
                
                $y=0;
                $vektor_subkriteria = 0;
                foreach($data_nilai_evaluasi->result() as $row_data_nilai_evaluasi){
                    $vektor_subkriteria = $vektor_subkriteria + pow($row_data_nilai_evaluasi->nilai,$data_bobot_subkriteria[$row_data_nilai_evaluasi->id_subkriteria]);
                }
                $data_json[$x]['vektor_s_'.$row_kriteria->id_kriteria]=$vektor_subkriteria;
            }
            $x++;
        }
        $total_bobot = array();
        for($x=0;$x<count($data_id_kriteria);$x++){
            $total_bobot[$data_id_kriteria[$x]] = array_sum(array_column($data_json,'vektor_s_'.$data_id_kriteria[$x]));
        }
        for($x=0;$x<count($data_json);$x++){
            for($y=0;$y<count($data_id_kriteria);$y++){
                $vektor_v = $data_json[$x]['vektor_s_'.$data_id_kriteria[$y]] / $total_bobot[$data_id_kriteria[$y]];
                $rcalc_sk = $vektor_v / $data_bobot_kriteria[$data_id_kriteria[$y]];
                $data_json[$x]['vektor_v_'.$data_id_kriteria[$y]] = $vektor_v;
                $data_json[$x]['rcalc_'.$data_id_kriteria[$y]] = $rcalc_sk;
            }
        }
        $sum_vektor = 0;
        for($x=0;$x<count($data_json);$x++){
            for($y=0;$y<count($data_id_kriteria);$y++){
                $sum_vektor = $sum_vektor + $data_json[$x]['rcalc_'.$data_id_kriteria[$y]];
            }
        }
        
        for($x=0;$x<count($data_json);$x++){
            $total_rcalc = 0;
            for($y=0;$y<count($data_id_kriteria);$y++){
                
                $total_rcalc += $data_json[$x]['rcalc_'.$data_id_kriteria[$y]];
            }
            $data_json[$x]['vektor_v_r'] = $total_rcalc / $sum_vektor;
        }
        
        //Sort Array Vektor_V_R Desc
        usort($data_json, function($a, $b) {
            if ($a['vektor_v_r'] == $b['vektor_v_r'])
                return 0;
            return $a['vektor_v_r'] < $b['vektor_v_r'] ? 1 : -1;
        });
        return $data_json;
    }
    public function data_calc(){
        $data_wp = array();
        $bobot_global = array();
        $tbl_alternatif = $this->db->get('tbl_alternatif')->result_array();
        $tbl_subkriteria = $this->db->get('tbl_subkriteria')->result_array();
        //Memasukkan Data Nama Siswa Kedalam Array Data Weighted Product
        for($x=0;$x<count($tbl_alternatif);$x++){
            $data_wp[$x]['nis'] = $tbl_alternatif[$x]['nis'];
            $data_wp[$x]['nama'] = $tbl_alternatif[$x]['nama_siswa'];
        }
        //Mengambil Nilai Bobot Global dan menggunakan Kode id_subkriteria sebagai index key
        for($x=0;$x<count($tbl_subkriteria);$x++){
            $bobot_global[$tbl_subkriteria[$x]['id_subkriteria']]=$tbl_subkriteria[$x]['bobot_global'];
        }
        
        //Mengambil Nilai Siswa
        for($x=0;$x<count($tbl_alternatif);$x++){
            //Mengambil Nilai PerSiswa
            $this->db->select('*');
            $this->db->from('tbl_evaluasi');
            $this->db->where('nis',$tbl_alternatif[$x]['nis']);
            $nilai_alternatif = $this->db->get()->result();
            //Nilai Vektor S Awal adalah 0
            $nilai_vektor = 0;
            //Perulangan Untuk Setiap Nilai Siswa
            foreach($nilai_alternatif as $nilai_alt){
                //Menghitung nilai Vektor dengan mengkuadratkan nilai subkriteria dengan bobot global key index subkriteria
                $nilai_vektor = $nilai_vektor + pow($nilai_alt->nilai,$bobot_global[$nilai_alt->id_subkriteria]);
            }
            //Mengambah Nilai Vektor S
            $data_wp[$x]['vektor_s'] = $nilai_vektor;
        }
        
        //Menghitung Total Nilai Vektor S
        $total_vektor_s = 0;
        foreach ($data_wp as $num => $values) {
            $total_vektor_s += $values['vektor_s'];
        }
        //Menghitung Nilai Vektor V dengan Membagi Nilai Vektor S Siswa dengan Total Vektor S
        for($x=0;$x<count($data_wp);$x++){
            $data_wp[$x]['vektor_v'] = $data_wp[$x]['vektor_s']/$total_vektor_s;
        }
        
        usort($data_wp, function($a, $b) {
            if ($a['vektor_v'] == $b['vektor_v'])
                return 0;
            return $a['vektor_v'] < $b['vektor_v'] ? 1 : -1;
        });
        
        return $data_wp;
    }
    public function data_rows_kriteria(){
        $tbl_kriteria = $this->db->get('tbl_kriteria');
        return $tbl_kriteria;
    }
}
