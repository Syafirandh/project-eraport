<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RekapTahunAkademik_m extends CI_Model {

    public static $kategori = ['Siswa','Kelas','Mata Pelajaran'];

    function getTahun()
    {
        $query = $this->db->get('tahun_akademik');
        return $query->result();
    }
}

/* End of file RekapTahunAkademik_m.php */