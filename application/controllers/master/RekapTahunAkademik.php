<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RekapTahunAkademik extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('RekapTahunAkademik_m');
    }
    
    public function index()
    {
        // foreach (RekapTahunAkademik_m::$kategori as $key => $value) {
        //     $k[] = $key;
        //     $v[] = $value;
        // }
        // return dd($k[2]);
        // return dd($this->RekapTahunAkademik_m->getTahun());
        $data['master'] = $data['rekapTahunAkademik'] = true;
        $data['kategori'] = RekapTahunAkademik_m::$kategori;
        $data['tahunAkademik'] = $this->RekapTahunAkademik_m->getTahun();
        $data['content'] = 'master/rekap/rekap_tahun_akademik';
        $this->load->view('index',$data);
    }

    public function getAjax()
    {
        if($this->input->post('idtahun_akademik')){
            return 'hihiha';
        }
    }
}

/* End of file Guru.php */