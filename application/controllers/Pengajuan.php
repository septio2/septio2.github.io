<?php
class Pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengajuan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Pengajuan Cuti';
        $data['libur'] = $this->Pengajuan_model->getAllLibur();
        $data['asn'] = $this->Pengajuan_model->getAllAsn();
        $data['atasan'] = $this->Pengajuan_model->getAllAtasan();
        $this->load->view('templates/header', $data);
        $this->load->view('pengajuan/index');
        $this->load->view('templates/footer');
    }

    public function form()
    {
        $data['asn'] = $this->db->get_where('asn', ['nipnrp' => $this->input->post('nipnrp')])->row_array();
        $data['ats'] = $this->db->get_where('atasan', ['nipnrp' => $this->input->post('atasan')])->row_array();
        $data['libur'] = $this->db->get('libur')->result_array();
        $data['als'] = $this->input->post('alasan');
        $data['alm'] = $this->input->post('alamat');
        $data['tlp'] = $this->input->post('telp');
        $data['lama'] = $this->input->post('lamaCuti');
        $data['mulai'] = $this->input->post('mulaiCuti');
        $data['akhir'] = $this->input->post('akhirCuti');

        $this->load->view('pengajuan/form', $data);
    }

    public function cuti2()
    {


        $this->form_validation->set_rules('asn', 'ASN', 'required');




        if ($this->form_validation->run() == false) {

            $data = [
                'imasakerja' => 0,
                'inip' => '',
                'ijabatan' => '',
                'iunker' => '',
                'alasan' => '',
                'mulai' => '',
                'lama' => 0,
                'next5WD' => 0,
                'alamat' => '',
                'telepon' => '',
                'inama' => '',
                'iinip' => '',
                'iinama' => '',
                'iijabatan' => '',
                'iiinip' => '',
                'iiinama' => '',
                'iiijabatan' => ''
            ];
            $data['libur'] = $this->Pengajuan_model->getAllLibur();
            $data['asn'] = $this->Pengajuan_model->getAllAsn();
            $data['atasan'] = $this->Pengajuan_model->getAllAtasan();
            $this->load->view('pengajuan/cuti2', $data);
        } else {
            $nipnrp = $this->input->post('asn');
            $nipatasan = $this->input->post('atasan');
            $asn = $this->db->get_where('asn', ['nipnrp' => $nipnrp])->row_array();
            $atasan = $this->db->get_where('atasan', ['nipnrp' => $nipatasan])->row_array();
            $pejabat = $this->db->get_where('atasan', ['nipnrp' => $this->input->post('pejabat')])->row_array();
            $data = [
                'imasakerja' => 0,
                'inip' => $asn['nipnrp'],
                'ijabatan' => $asn['jabatan'],
                'iunker' => $asn['unitkerja'],
                'imasakerja' => $asn['masakerja'],
                'alasan' => $this->input->post('alasan'),
                'mulai' => $this->input->post('mulaiCuti'),
                'lama' => $this->input->post('lamaCuti'),
                'next5WD' => 0,
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telp'),
                'inama' => $asn['nama'],
                'iinip' => $atasan['nipnrp'],
                'iinama' => $atasan['nama'],
                'iijabatan' => $atasan['jabatan'],
                'iiinip' => $pejabat['nipnrp'],
                'iiinama' => $pejabat['nama'],
                'iiijabatan' => $pejabat['jabatan']
            ];
            $data['libur'] = $this->Pengajuan_model->getAllLibur();
            $data['asn'] = $this->Pengajuan_model->getAllAsn();
            $data['atasan'] =
                $this->Pengajuan_model->getAllAtasan();

            $this->load->view('pengajuan/cuti2', $data);
        }
    }

    public function getAsn()
    {
        $id = $this->input->post('id');
        // get data 
        $data = $this->pengajuan_model->getAsn($id);
        echo json_encode($data);
    }
}
