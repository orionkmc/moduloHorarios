<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Building_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    function get($_id)
    {
        return $this->db->where('headquarters',$_id)->get('building')->result();
    }

    function exists_in_db($row) 
    {
        $query = $this->db->where('headquarters', $row['headquarters'])->where('name', $row['name'])->get('building');
        $this->db->last_query();
        return ($query->num_rows() > 0);
    }

    function insert($_data)
    {
        $data = array(
            'headquarters' => $_data->post('headquarters'),
            'name' => $_data->post('building')
        );

        if ($this->exists_in_db($data))
        {
            return false;
        }

        if ($this->db->insert('building', $data))
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
        if (!$this->db->where('cod_edi', $id)->delete('salones')) {
            return FALSE;
        }
        
        if ($this->db->where('id', $id)->delete('building')) 
        {
            return TRUE;
        } 
        else 
        {
            return FALSE;
        }
    }

    function get_by_id($id) 
    {
        $query = $this->db->where('id', $id)->get('building');
        if ($query->num_rows() == 0) 
        {
            return 0;
        }
        return $query->result();
    }

    function update($_data) 
    {
        $data = array(
            'name' => $_data->post('building'),
            'id' => $_data->post('id')
        );

        if ($this->db->where('id', $_data->post('id'))->update('building', $data)) 
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }
}