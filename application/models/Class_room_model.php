<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Class_room_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    function get($_id)
    {
        return $this->db->where('cod_edi',$_id)->get('salones')->result();
    }

    function exists_in_db($row) 
    {
        $query = $this->db->where('salon', $row['salon'])->where('cod_edi', $row['cod_edi'])->where('tipo', $row['tipo'])->get('salones');
        $this->db->last_query();
        return ($query->num_rows() > 0);
    }

    function insert($_data)
    {
        $data = array(
            'salon' => $_data->post('class_room'),
            'cod_edi' => $_data->post('building'),
            'tipo' => $_data->post('classroom_type'),
        );

        if ($this->exists_in_db($data))
        {
            return false;
        }

        if ($this->db->insert('salones', $data))
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
}