<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('mapel_m');
        $this->load->model('configuration_m');
        $this->pk = mapel_m::$pk;
        $this->table = mapel_m::$table;
    }
    
    public function index()
    {
        $data['master'] = $data['mapel'] = true;
        $data['tahunAkademik'] = $this->configuration_m->getData();
        $data['mapel'] = $this->mapel_m->getData();
        $data['content'] = 'master/mapel';
        $this->load->view('index',$data);
    }
    /**
    * Save | Update
    * @return Object
    */
    public function save() {
        $id = _toInteger($this->input->post('idmapel', true));
        $dataset = $this->dataset();
        if (_isNaturalNumber( $id )) {
            $this->vars['status'] = $this->db->update($this->table, $dataset,[$this->pk=>$id]) ? 'success' : 'error';
            $this->vars['status'] == 'success' ? $this->session->set_flashdata('success', 'Data Berhasil Diupdate !') : $this->session->set_flashdata('error', 'Data Gagal Diupdate !');
        } else {
            $cek = $this->db->get_where($this->table,['mapel_kd'=>$dataset['mapel_kd']]);
            if($cek->num_rows()==0){
                $this->vars['status'] = $this->db->insert($this->table, $dataset) ? 'success' : 'error';
                $this->vars['status'] == 'success' ? $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan !') : $this->session->set_flashdata('error', 'Data Gagal Ditambahkan !');
            }else{
                $this->session->set_flashdata('error', 'Kode Mapel Sudah Ada !');
            }
        }
        redirect('master/mapel');
    }
    /**
    * Dataset
    * @return Array
    */
    private function dataset() {
        return [
            'mapel_kd'       => $this->input->post('mapel_kd', true),
            'mapel_nama'     => $this->input->post('mapel_nama', true),
            'tahun_akademik' => $this->input->post('tahun_akademik', true)
        ];
    }
    /**
    * View By Id
    * @return Array
    */
    public function view()
    {
        $id = $this->input->post('id', true);
        $data = $this->db->get_where($this->table,[$this->pk=>$id])->row();
        echo json_encode($data);
    }
    /**
    * Delete By Id
    * @return Array
    */
    public function delete($id)
    {
        $delete = $this->db->delete($this->table,[$this->pk=>$id])?'success':'error';
        $delete == 'success' ? $this->toastr->success('Hapus data berhasil') : $this->toastr->error('Hapus data gagal');
        redirect('master/mapel');
    }

}

/* End of file Mapel.php */