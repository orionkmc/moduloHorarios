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
}