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
}