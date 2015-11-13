<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Building extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Headquarters_model');
        $this->load->model('Building_model');
    }
    public function view()
    {        
        $data['headquarters'] = $this->Headquarters_model->get_all();
        $this->load->view('base/head', $data);
        $this->load->view('PhysicalPlant/building/view', $data);
        $this->load->view('base/foot');
    }
    
    public function building($_id)
    {
        $post = $this->Building_model->get($_id);
        echo '{"data":',  json_encode($post),'}';
    }
}