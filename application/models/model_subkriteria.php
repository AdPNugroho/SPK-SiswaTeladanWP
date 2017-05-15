<?php

class Model_subkriteria extends CI_Model {

    public function tambah_subkriteria($data) {
        //Lakukan Insert Data
        $query = $this->db->insert('tbl_subkriteria', $data);
        //Mengambil ID Primary Key Insert
        $id = $this->db->insert_id();
        //Validasi apakah berhasil Menambah Data
        if ($query) {
            //Mencari Data Siswa
            $siswa = $this->db->get('tbl_alternatif');
            //Jika ditemukan Siswa
            if ($siswa->num_rows() > 0) {
                //Array Data Siswa untuk BatchInsert
                $data_siswa = array();
                foreach ($siswa->result() as $row) {
                    $x = array(
                        'nis' => $row->nis,
                        'id_subkriteria' => $id
                    );
                    $data_siswa[] = $x;
                }
                $batch_insert = $this->db->insert_batch('tbl_evaluasi', $data_siswa);
                if ($batch_insert) {
                    //Pesan Response
                    $response = array('status' => 'success', 'message' => 'Data Subkriteria Berhasil Di Input');
                    return json_encode($response);
                } else {
                    //Pesan Response
                    $response = array('status' => 'error', 'message' => 'Telah Terjadi kesalahan');
                    return json_encode($response);
                }
            } else {
                //Pesan Response
                $response = array('status' => 'success', 'message' => 'Data Subkriteria Berhasil Di Input');
                return json_encode($response);
            }
            //Jika Gagal Menambah Data
        } else {
            //Pesan Response
            $response = array('status' => 'error', 'message' => 'Telah Terjadi kesalahan');
            return json_encode($response);
        }
    }

    public function edit_subkriteria($data) {
        $check = $this->db->set($data)->where('id_subkriteria', $data['id_subkriteria'])->update('tbl_subkriteria');
        //Validasi apakah berhasil mengupdate Data
        if ($check) {
            //Pesan Response
            $response = array(
                'status' => 'success',
                'message' => 'Data Subkriteria Berhasil Di Edit'
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

    public function hapus_subkriteria($data) {
        //Hapus Data Kriteria
        $check = $this->db->delete('tbl_subkriteria', array('id_subkriteria' => $data['id_subkriteria']));
        //Check jika telah berhasil menghapus Subriteria
        if ($check) {
            //Pesan Response
            $response = array(
                'status' => 'success',
                'message' => 'Data Subkriteria Berhasil Di Hapus'
            );
            return json_encode($response);
            //Jika Gagal Menghapus Subkriteria
        } else {
            //Pesan Response
            $response = array(
                'status' => 'error',
                'message' => 'Telah Terjadi kesalahan'
            );
            return json_encode($response);
        }
    }

    public function lihat_subkriteria() {
        return $this->db->select('*')->from('tbl_subkriteria')->join('tbl_kriteria', 'tbl_subkriteria.id_kriteria=tbl_kriteria.id_kriteria')->get();
    }

    public function lihat_bobot_subkriteria($data) {
        $this->db->select('tbl_subkriteria.id_subkriteria,tbl_kriteria.nama_kriteria,tbl_subkriteria.nama_subkriteria,tbl_subkriteria.bobot,tbl_subkriteria.hasil_bobot,tbl_subkriteria.bobot_global');
        $this->db->from('tbl_subkriteria');
        $this->db->join('tbl_kriteria', 'tbl_subkriteria.id_kriteria=tbl_kriteria.id_kriteria');
        $this->db->where('tbl_subkriteria.id_kriteria', $data['id_kriteria']);
        return $this->db->get();
    }

    public function lihat_data_subkriteria($data) {
        $this->db->select('tbl_subkriteria.id_subkriteria,tbl_kriteria.nama_kriteria,tbl_subkriteria.nama_subkriteria,tbl_subkriteria.bobot,tbl_subkriteria.hasil_bobot');
        $this->db->from('tbl_subkriteria');
        $this->db->join('tbl_kriteria', 'tbl_subkriteria.id_kriteria=tbl_kriteria.id_kriteria');
        $this->db->where('tbl_subkriteria.id_kriteria', $data['id_kriteria']);
        return $this->db->get();
    }

    public function simpan_bobot($data) {
        $query = $this->db->select('*')->from('tbl_kriteria')->where('id_kriteria',$data['id_kriteria'])->get();
        $ret = $query->row();
        $bobot_nilai = $ret->hasil_bobot;
        for ($x = 0; $x < count($data['id_subkriteria']); $x++) {
            $bobot_global = $data['hasil_bobot'][$x]*$bobot_nilai;
            $insert = array(
                'bobot' => $data['bobot'][$x],
                'hasil_bobot' => $data['hasil_bobot'][$x],
                'bobot_global'=> $bobot_global
            );
            $check = $this->db->set($insert)->where('id_subkriteria', $data['id_subkriteria'][$x])->update('tbl_subkriteria');
            if ($check) {
                $status = TRUE;
            } else {
                $status = FALSE;
                break;
            }
        }
        if ($status) {
            //Pesan Response
            $response = array(
                'status' => 'info',
                'message' => 'Bobot Telah Disimpan'
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
    
    public function count_subkriteria(){
        return $this->db->count_all('tbl_subkriteria');
    }
}
