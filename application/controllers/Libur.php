<?php
class Libur extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Libur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['libur']=$this->Libur_model->getAllLibur();
        $data['judul']='Daftar Hari Libur';
        $this->load->view('templates/header',$data);
        $this->load->view('libur/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');
        if($this->form_validation->run()==FALSE){
        $data['judul']='Tambah Hari Libur';
        $this->load->view('templates/header',$data);
        $this->load->view('libur/tambah');
        $this->load->view('templates/footer');
        }
        else{
            $this->Libur_model->tambahDataLibur();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('libur');
        }
    }
}