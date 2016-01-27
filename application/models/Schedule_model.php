<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model
{

    public function __construct() 
    {

        parent::__construct();

    }

    function get_all() 
    {
        return $this->db->get('schedule')->result();
    }

    function get($id)
    {
        return $this->db->where('classrooms',$id)->get('schedule')->result();
    }

    function update($_data)
    {
        $data = array(
            'id' => $_data->post('id'),
            'status' => $_data->post('status')
        );
        $this->db->where('id', $data['id'])->update('schedule', $data);
        /*print_r($this->db->last_query());*/
        
        /*if ($this->db->where('id', $data->id)->update('building', $data)) 
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }*/
    }
}