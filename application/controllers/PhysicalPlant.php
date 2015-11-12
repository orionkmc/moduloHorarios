<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhysicalPlant extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Building_model');
    }
    public function index()
    {
        $data['schedule'] = '';
        $data['physicalPlant'] = 'active';
        $data['active'] = '';
        $data['classroom'] = $this->Building_model->get_all();
        $this->load->view('base/head', $data);
        $this->load->view('PhysicalPlant/classroom', $data);
        $this->load->view('base/foot');
    }
    public function getData($_id)
    {
        $post = $this->Building_model->get($_id);
        echo json_encode($post);
    }
}