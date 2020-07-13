<?php

class Config_model extends CI_Model
{
    private $table = 'action';
    private $id = 'action.id_action';


    function __construct()
    {
        $this->table = "action";
        parent::__construct();
    }

    function jml_data()
    {
        $query = $this->db->get($this->table);
        $total = $query->num_rows();
        return $total;
    }

    function semua_data()
    {

        $this->db->select('
            action.*,
            ');
        $this->db->from('action');
        $this->db->order_by('id_action', 'asc');
        $query = $this->db->get();
        return $query->result();
    }


    function input_data($data)
    {
        $this->db->insert($this->table, $data);
    }

    function total_pemain()
    {
        $this->db->from('pemain');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function detail_data($id_action)
    {
        $this->db->select('
            action.*,
            ');
        // $this->db->from('pemain');
        $query =  $this->db->get_where($this->table, array('id_action' => $id_action));
        return $query->row();
    }

    function update_data($data, $id_action)
    {
        $this->db->where('id_action', $id_action);
        $this->db->update($this->table, $data);
    }

    function hapus_data($id_data)
    {
        $this->db->where('id_action', $id_data);
        $this->db->delete($this->table);
    }
}
