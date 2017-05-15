<?php
class Dashboard extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('model_kriteria');
        $this->load->model('model_subkriteria');
        $this->load->model('model_alternatif');
    }

    public function index(){
        $data['kriteria']=$this->model_kriteria->count_kriteria();
        $data['subkriteria']=$this->model_subkriteria->count_subkriteria();
        $data['alternatif']=$this->model_alternatif->count_alternatif();
        $this->load->view('Dashboard',$data);
    }
}