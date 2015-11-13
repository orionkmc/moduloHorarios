<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Headquarters_model extends CI_Model
{

    public function __construct() 
    {

        parent::__construct();

    }

    function get_all() 
    {
        return $this->db->get('sede')->result();
    }
}