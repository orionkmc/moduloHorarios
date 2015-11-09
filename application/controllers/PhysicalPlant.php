<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhysicalPlant extends CI_Controller 
{
    public function index()
    {
        $data['schedule'] = '';
        $data['physicalPlant'] = 'active';
        $data['reports'] = '';
        $this->load->view('base/head', $data);
        $this->load->view('PhysicalPlant/view');
        $this->load->view('base/foot');
    }
}