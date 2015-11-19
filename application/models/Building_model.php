<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Building_model extends CI_Model
{

    public function __construct() 
    {

        parent::__construct();

    }

    function get($_id)
    {
        return $this->db->where('id_sede',$_id)->get('edificio')->result();
    }

    function exists_in_db($row) 
    {
        $query = $this->db->where('id_sede', $row['id_sede'])->where('edificio', $row['edificio'])->get('edificio');
        $this->db->last_query();
        return ($query->num_rows() > 0);
    }

    function insert($_data)
    {
        $data = array(
            'id_sede' => $_data->post('headquarters'),
            'edificio' => $_data->post('building')
        );

        if ($this->exists_in_db($data))
        {
            return false;
        }

        if ($this->db->insert('edificio', $data))
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    function delete($id) 
    {
        if ($this->db->where('id', $id)->delete('edificio')) 
        {
            return TRUE;
        } 
        else 
        {
            return FALSE;
        }
    }
}