<?php

class Subkriteria extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_kriteria');
        $this->load->model('model_subkriteria');
        $this->load->library('table');
    }

    function index() {
        $data['data_kriteria'] = $this->model_kriteria->lihat_kriteria();
        $this->load->view('Subkriteria', $data);
    }

    function tambah_subkriteria() {
        if ($_POST) {
            $data = array(
                'id_kriteria' => $this->input->post('id_kriteria'),
                'nama_subkriteria' => $this->input->post('nama_subkriteria')
            );
            echo $this->model_subkriteria->tambah_subkriteria($data);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    function edit_subkriteria() {
        if ($_POST) {
            $data = array(
                'id_subkriteria' => $this->input->post('id_subkriteria'),
                'id_kriteria' => $this->input->post('id_kriteria'),
                'nama_subkriteria' => $this->input->post('nama_subkriteria')
            );
            echo $this->model_subkriteria->edit_subkriteria($data);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    function hapus_subkriteria() {
        if ($_POST) {
            $data = array(
                'id_subkriteria' => $this->input->post('id_subkriteria')
            );
            echo $this->model_subkriteria->hapus_subkriteria($data);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    function lihat_subkriteria() {
        $data['subkriteria'] = $this->model_subkriteria->lihat_subkriteria();
        $this->load->view('view/table_subkriteria', $data);
    }

    function bobot_subkriteria() {
        $data['data_kriteria'] = $this->model_kriteria->lihat_kriteria();
        $this->load->view('bobot_subkriteria', $data);
    }

    function lihat_bobot_subkriteria() {
        if ($_POST) {
            $data = array(
                "id_kriteria" => $this->input->post('id_kriteria')
            );
            $result = $this->model_subkriteria->lihat_bobot_subkriteria($data)->result();
            echo json_encode($result);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    function simpan_bobot_subkriteria() {
        if($_POST){
            $data = array(
                'id_subkriteria'=>$this->input->post('id_subkriteria'),
                'bobot'=>$this->input->post('bobotsubkriteria'),
                'id_kriteria' => $this->input->post('id_kriteria')
            );
            for($x=0;$x<count($data['id_subkriteria']);$x++){
                $data['hasil_bobot'][$x]=$data['bobot'][$x]/array_sum($data['bobot']);
            }
            echo $this->model_subkriteria->simpan_bobot($data);
        }else{
            redirect(base_url('dashboard'));
        }
    }
    

}
