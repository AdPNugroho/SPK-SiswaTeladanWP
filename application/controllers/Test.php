<?php

class Test extends CI_Controller {

    function index() {
        $url = "http://www.jne.co.id/id/beranda";
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_USERAGENT => "spider",
            CURLOPT_AUTOREFERER => true,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $error = curl_errno($ch);
        $error_message = curl_error($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $data['error'] = $error;
        $data['error_message'] = $error_message;
        $data['info'] = $info;
        $data['result'] = $result;
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    function test_pow(){
        echo pow(5,3);
    }
    function test_bobot(){
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
        echo "<pre>";
        print_r($data_wp);
        echo "</pre>";
        
    }
}
