<?php

class Asn_model extends CI_model{
    public function getAllAsn()
    {
        return $query = $this->db->get('asn')->result_array();
    }

    public function tambahDataAsn()
{
    $maKer=$this->input->post('masakerja')."-01";
    $data = [
        "nipnrp"=> $this->input->post('nip',true),
        "nama"=> $this->input->post('nama',true),
        "jabatan"=> $this->input->post('jabatan',true),
        "unitkerja"=> $this->input->post('unker',true),
        "masakerja"=> $maKer
    ];
    $this->db->insert('asn',$data);
}

public function hapusDataAsn($nipnrp){
    $this->db->where('nipnrp',$nipnrp);
    $this->db->delete('asn',);
}

public function getAsnById($nipnrp){
    return $this->db->get_where('asn',['nipnrp'=>$nipnrp])->row_array();
}

public function cariDataAsn(){
    $keyword = $this->input->post('keyword',true);
    $this->db->like('nama',$keyword);
    return $this->db->get('asn')->result_array();
}
}