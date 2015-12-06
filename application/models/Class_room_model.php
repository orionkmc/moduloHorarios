<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Class_room_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    function get($_id, $path)
    {
        if ($path==1) 
        {
            return $this->db->where('cod_edi',$_id)->get('salones')->result();
            /*print_r($this->db->last_query());*/
        }
        else if ($path==2) 
        {
            return $this->db->group_by(array('tipo','name' ))->order_by('tipo', 'ASC')->select('classroom_type.name, salones.tipo')->from('salones')->join('classroom_type', 'salones.tipo = classroom_type.id')->where('cod_edi',$_id)->get()->result();
             /*print_r($this->db->last_query());*/
        }
    }

    function class_room_forBC($building, $classroom_type)
    {
        return $this->db->where('cod_edi',$building)->where('tipo',$classroom_type)->get('salones')->result();
    }
    

    function exists_in_db($row) 
    {
        $query = $this->db->where('salon', $row['salon'])->where('cod_edi', $row['cod_edi'])->where('tipo', $row['tipo'])->get('salones');
        /*$this->db->last_query();*/
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

/*SELECT b.name ,a.tipo FROM salones a INNER JOIN classroom_type b ON a.tipo = b.id WHERE a.cod_edi = '41' GROUP BY a.tipo, name;*/