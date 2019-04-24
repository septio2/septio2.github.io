<?php
class Pengajuan_model extends CI_model
{
    public function getAllLibur()
    {
        return $query = $this->db->get('libur')->result_array();
    }
    public function getAllAsn()
    {
        return $query = $this->db->get('asn')->result_array();
    }
    public function getAllAtasan()
    {
        return $query = $this->db->get('atasan')->result_array();
    }
    function getAsn($id)
    {
        return $this->db->get_where('asn', ['nipnrp' => $id])->row_array();
    }
}
