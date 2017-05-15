<?php

class Model_kriteria extends CI_Model {

    public function tambah_kriteria($data) {
        //Lakukan Insert Data
        $query = $this->db->insert('tbl_kriteria', $data);
        //Validasi apakah berhasil Menambah Data
        if ($query) {
            //Pesan Response
            $response = array(
                'status' => 'success',
                'message' => 'Data Alternatif Berhasil Di Edit'
            );
            return json_encode($response);
            //Jika Gagal Menambah Data
        } else {
            //Pesan Response
            $response = array(
                'status' => 'error',
                'message' => 'Telah Terjadi kesalahan'
            );
            return json_encode($response);
        }
    }

    public function lihat_kriteria() {
        return $this->db->get('tbl_kriteria');
    }

    public function edit_kriteria($data) {
        //Lakukan Update Data
        $check = $this->db->set($data)->where('id_kriteria', $data['id_kriteria'])->update('tbl_kriteria');
        //Validasi apakah berhasil mengupdate Data
        if ($check) {
            //Pesan Response
            $response = array(
                'status' => 'success',
                'message' => 'Data Kriteria Berhasil Di Edit'
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

    public function hapus_kriteria($data) {
        //Hapus Data Kriteria
        $check = $this->db->delete('tbl_kriteria', array('id_kriteria' => $data['id_kriteria']));
        //Check jika telah berhasil menghapus Kriteria
        if ($check) {
            //Pesan Response
            $response = array(
                'status' => 'success',
                'message' => 'Data Kriteria Berhasil Di Hapus'
            );
            return json_encode($response);
            //Jika Gagal Menghapus Kriteria
        } else {
            //Pesan Response
            $response = array(
                'status' => 'error',
                'message' => 'Telah Terjadi kesalahan'
            );
            return json_encode($response);
        }
    }

    public function lihat_bobot_kriteria() {
        return $this->db->get('tbl_kriteria');
    }

    public function simpan_bobot($data) {
        for ($x = 0; $x < count($data['id_kriteria']); $x++) {
            $insert = array(
                'bobot' => $data['bobot'][$x],
                'hasil_bobot' => $data['hasil_bobot'][$x]
            );
            $this->db->set($insert)->where('id_kriteria', $data['id_kriteria'][$x])->update('tbl_kriteria');
            $data_subkriteria = $this->db->select('*')->from('tbl_subkriteria')->where('id_kriteria', $data['id_kriteria'][$x])->get()->result();
            $index_subk = 0;
            $data_update = array();
            foreach ($data_subkriteria as $row) {
                $data_update[$index_subk]['id_subkriteria'] = $row->id_subkriteria;
                $data_update[$index_subk]['bobot_global'] = $row->hasil_bobot * $insert['hasil_bobot'];
                $index_subk++;
            }
            for ($du_x = 0; $du_x < count($data_update); $du_x++) {
                $insert = array(
                    'bobot_global' => $data_update[$du_x]['bobot_global']
                );
                $check = $this->db->set($insert)->where('id_subkriteria', $data_update[$du_x]['id_subkriteria'])->update('tbl_subkriteria');
                if ($check) {
                    $status = TRUE;
                } else {
                    $status = FALSE;
                    break;
                }
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

    public function count_kriteria() {
        return $this->db->count_all('tbl_kriteria');
    }

}
