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
}