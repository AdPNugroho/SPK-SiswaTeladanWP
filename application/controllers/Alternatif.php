<?php

class Alternatif extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_alternatif');
        $this->load->model('model_kriteria');
        $this->load->model('model_subkriteria');
        $this->load->library('table');
    }

    function index() {
        $this->load->view('alternatif');
    }

    function tambah_alternatif() {
        if ($_POST) {
            $data = array(
                'nis' => html_escape($this->input->post('nis')),
                'nama_siswa' => html_escape($this->input->post('nama')),
                'alamat' => html_escape($this->input->post('alamat')),
                'tempat_lahir' => html_escape($this->input->post('pob')),
                'tanggal_lahir' => html_escape($this->input->post('dob'))
            );
            echo $this->model_alternatif->tambah_alternatif($data);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    function edit_alternatif() {
        if ($_POST) {
            $data = array(
                'nis' => html_escape($this->input->post('nis')),
                'nama_siswa' => html_escape($this->input->post('nama')),
                'alamat' => html_escape($this->input->post('alamat')),
                'tempat_lahir' => html_escape($this->input->post('pob')),
                'tanggal_lahir' => html_escape($this->input->post('dob'))
            );
            echo $this->model_alternatif->edit_alternatif($data);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    function hapus_alternatif() {
        if ($_POST) {
            $data = array(
                'nis' => $this->input->post('nis')
            );
            echo $this->model_alternatif->hapus_alternatif($data);
        } else {
            redirect(base_url('dashboard'));
        }
    }

    function lihat_alternatif() {
        $data['alternatif'] = $this->model_alternatif->lihat_alternatif();
        $this->load->view('view/table_alternatif', $data);
    }
    
    function evaluasi(){
        $data['data_kriteria'] = $this->model_kriteria->lihat_kriteria();
        $this->load->view('evaluasi_alternatif',$data);
    }

    function test_sort() {
        $data = array();
        for ($x = 0; $x <= 10; $x++) {
            $data[$x]['nilai'] = rand(1, 100);
            $data[$x]['nama'] = $x;
        }
        //sort($data['nilai']);
        usort($data, function($a, $b) {
            return $a['nilai'] <=> $b['nilai'];
        });

        echo "<pre>";
        print_r($data);
        echo "</pre>";

        //SORT DESC
        usort($data_subkriteria, function($a, $b) {
            if ($a['id_subkriteria'] == $b['id_subkriteria'])
                return 0;
            return $a['id_subkriteria'] < $b['id_subkriteria'] ? 1 : -1;
        });
    }

    function daftar_evaluasi() {
        //$id = 1;
        $id = $this->input->post('id_kriteria');
        $data_subkriteria = $this->db->select('*')->from('tbl_subkriteria')->where('id_kriteria', $id)->get()->result_array();
        $data_siswa = $this->db->select('*')->from('tbl_alternatif')->get()->result();
        
        //echo "<pre>";
        //print_r($data_siswa);
        //echo "</pre>";
        
        $data_nilai = array();
        $x = 0;
        foreach ($data_siswa as $row) {
            $data_nilai[$x]['nama'] = $row->nama_siswa;
            $data_nilai[$x]['nis'] = $row->nis;
            $y = 0;
            $this->db->select('*')->from('tbl_evaluasi')->join('tbl_subkriteria', 'tbl_evaluasi.id_subkriteria=tbl_subkriteria.id_subkriteria')->where('tbl_evaluasi.nis', $row->nis)->where('tbl_subkriteria.id_kriteria', $id);
            $nilai = $this->db->get()->result();
            foreach($nilai as $baris){
                $data_nilai[$x]['nilai_siswa'][$y]['id_subkriteria']=$baris->id_subkriteria;
                $data_nilai[$x]['nilai_siswa'][$y]['nilai']=$baris->nilai;
                $y++;
            }
            $x++;
        }
        //echo "<pre>";
        //print_r($data_nilai);
        //echo "</pre>";
        echo json_encode(array('data_kriteria'=>$data_subkriteria,'data_nilai'=>$data_nilai));
    }

    function data_edit(){
        if($_POST){
            $data = array(
                'nis'=>$this->input->post('nis'),
                'id_kriteria'=>$this->input->post('id_kriteria')
            );
            
            //TODO
            $arr = $this->model_alternatif->data_edit($data)->result();
            echo json_encode($arr);
        }else{
            redirect(base_url('dashboard'));
        }
    }
    
    function simpan_edit(){
        if($_POST){
            $data = array(
                'id_evaluasi'=>$this->input->post('id_evaluasi'),
                'nilai'=>$this->input->post('nilai_evaluasi')
            );
            echo $this->model_alternatif->simpan_edit($data);   
        }else{
            redirect(base_url('dashboard'));
        }
    }
    
    function calculate(){
        $this->load->view('Calculate');
    }
    function table_calculate(){
        $data['vektor'] = $this->model_alternatif->data_calc();
        $this->load->view('view/table_vektor',$data);
    }
}
