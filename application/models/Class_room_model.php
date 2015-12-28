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
            return $this->db->where('building',$_id)->get('classrooms')->result();
            /*print_r($this->db->last_query());*/
        }
        else if ($path==2) 
        {
            return $this->db->group_by(array('classrooms.classroom_type','classroom_type.name'))->order_by('classroom_type', 'ASC')->select('classroom_type.name, classrooms.classroom_type')->from('classrooms')->join('classroom_type', 'classrooms.classroom_type = classroom_type.id')->where('building',$_id)->get()->result();
             /*print_r($this->db->last_query());*/
        }
    }

    function class_room_forBC($building, $classroom_type)
    {
        return $this->db->where('building',$building)->where('classroom_type',$classroom_type)->get('classrooms')->result();
    }
    

    function exists_in_db($row) 
    {
        $query = $this->db->where('name', $row['name'])->where('building', $row['building'])->where('classroom_type', $row['classroom_type'])->get('classrooms');
        /*$this->db->last_query();*/
        return ($query->num_rows() > 0);
    }

    function insert($_data)
    {
        $data = array(
            'name' => $_data->post('class_room'),
            'building' => $_data->post('building'),
            'classroom_type' => $_data->post('classroom_type'),
        );

        if ($this->exists_in_db($data))
        {
            return false;
        }

        if ($this->db->insert('classrooms', $data))
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
        /*if (!*/
            $this->db->where('cod_edi', $id)->delete('salones');
            $this->db->last_query();
            /*) */
        /*{
            return FALSE;
        }
        
        if ($this->db->where('id', $id)->delete('building')) 
        {
            return TRUE;
        } 
        else 
        {
            return FALSE;
        }*/
    }
}
/*SELECT b.name ,a.classroom_type FROM namees a INNER JOIN classroom_type b ON a.classroom_type = b.id WHERE a.building = '41' GROUP BY a.classroom_type, name;*/