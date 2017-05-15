<?php

class Kriteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_kriteria');
        $this->load->library('table');
    }

    public function index() {
        $this->load->view('Kriteria');
    }

    public function tambah_kriteria() {
        if ($_POST) {
            $data = array(
                'nama_kriteria' => html_escape($this->input->post('nama_kriteria'))
            );
            echo $this->model_kriteria->tambah_kriteria($data);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    public function edit_kriteria() {
        if ($_POST) {
            $data = array(
                'id_kriteria' => html_escape($this->input->post('id_kriteria')),
                'nama_kriteria' => html_escape($this->input->post('nama_kriteria')),
            );
            echo $this->model_kriteria->edit_kriteria($data);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    public function hapus_kriteria() {
        if ($_POST) {
            $data = array(
                'id_kriteria' => html_escape($this->input->post('id_kriteria'))
            );
            echo $this->model_kriteria->hapus_kriteria($data);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    public function lihat_kriteria() {
        $data['kriteria'] = $this->model_kriteria->lihat_kriteria();
        $this->load->view('view/table_kriteria', $data);
    }

    public function bobot_kriteria() {
        $this->load->view('bobot_kriteria');
    }

    //Data JSON Bobot Kriteria
    public function json_kriteria() {
        $data = $this->model_kriteria->lihat_kriteria()->result();
        echo json_encode($data);
    }

    public function lihat_bobot_kriteria() {
        $data['bobot'] = $this->model_kriteria->lihat_kriteria();
        $this->load->view('view/table_bobotkriteria', $data);
    }

    //Fungsi Simpan Bobot Kriteria
    public function simpan_bobot() {
        //Jika ada Data POST dikirim
        if ($_POST) {
            //Menangkap Array data dari input post
            $data = array(
                'id_kriteria' => $this->input->post('id_kriteria'),
                'bobot' => $this->input->post('bobotkriteria')
            );
            //Menghitung nilai hasil bobot masing masing kriteria
            for ($x = 0; $x < count($data['id_kriteria']); $x++) {
                $data['hasil_bobot'][$x] = $data['bobot'][$x] / array_sum($data['bobot']);
            }
            //Output JSON Response
            echo $this->model_kriteria->simpan_bobot($data); //TODO UPDATE SIMPAN BOBOT, UPDATE BOBOT GLOBAL
        } else {
            redirect(base_url('dashboard'));
        }
    }

}
