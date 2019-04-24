<?php
class Libur_model extends CI_Model{
    public function getAllLibur()
    {
        return $query=$this->db->get('libur')->result_array();
    }

    public function tambahDataLibur()
    {
        $data=[
            "tanggal"=>$this->input->post('tanggal'),
            "keterangan"=>$this->input->post('keterangan')
        ];
        $this->db->insert('libur',$data);
    }
}