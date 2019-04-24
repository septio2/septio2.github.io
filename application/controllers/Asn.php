<?php

class Asn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Asn_model');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['judul'] = 'Daftar ASN';
        $data['asn'] = $this->Asn_model->getAllAsn();
        if ($this->input->post('keyword')) {
            $data['asn'] = $this->Asn_model->cariDataAsn();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('asn/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $data['judul'] = 'Form Tambah Data ASN';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP/NRP', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('unker', 'Unit Kerja', 'required');
        $this->form_validation->set_rules('masakerja', 'Masa Kerja', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('asn/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Asn_model->tambahDataAsn();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('asn');
        }
    }

    public function hapus($nipnrp)
    {
        $this->Asn_model->hapusDataAsn($nipnrp);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('asn');
    }

    public function detail($nipnrp)
    {
        $data['judul'] = "Detail data ASN";
        $data['asn'] = $this->Asn_model->getAsnById($nipnrp);
        $this->load->view('templates/header', $data);
        $this->load->view('asn/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($nipnrp)
    {
        $data['asn'] = $this->Asn_model->getAsnById($nipnrp);
        $data['judul'] = 'Form Ubah Data ASN';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP/NRP', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('unker', 'Unit Kerja', 'required');
        $this->form_validation->set_rules('masakerja', 'Masa Kerja', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('asn/ubah');
            $this->load->view('templates/footer');
        } else {
            $this->Asn_model->ubahDataAsn();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('asn');
        }
    }
}
