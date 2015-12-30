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

        }
        else if ($path==2) 
        {
            return $this->db->group_by(array('classrooms.classroom_type','classroom_type.name', 'classroom_type.id'))->order_by('classroom_type', 'ASC')->select('classroom_type.name, classrooms.classroom_type, classroom_type.id')->from('classrooms')->join('classroom_type', 'classrooms.classroom_type = classroom_type.id')->where('building',$_id)->get()->result();
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
            $id_last = $this->db->insert_id();
            $id_last_schedule = $this->db->order_by('id', 'DESC')->limit(1)->select('id')->get('schedule')->row();
            isset($id_last_schedule->id) ? $c = $id_last_schedule->id + 1 : $c = 1 ;
            for ($i=1; $i <= 19  ; $i++) 
            {
                for ($j=1; $j <= 7; $j++) 
                {
                    $_data = array(
                        'id' => $c,
                        'status' => $c,
                        'classrooms' => $id_last,
                        'rows' => $i,
                        'columns' => $j,
                    );
                    $this->db->insert('schedule', $_data);
                    $c++;
                }
            }
            return true;
        } 
        else 
        {
            return false;
        }
    }

    function delete($id) 
    {
        $building = $this->db->where('id',$id)->select('building')->get('classrooms')->result();
        if ($this->db->where('id', $id)->delete('classrooms'))
        {
            return $building;
        }
        else
        {
            return FALSE;
        }
    }
}
/*SELECT * FROM schedule ORDER BY id DESC LIMIT 1;*/