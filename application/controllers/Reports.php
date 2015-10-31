<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller 
{
    public function index()
    {
        $data['schedule'] = '';
        $data['physicalPlant'] = '';
        $data['reports'] = 'class="active"';
        $this->load->view('base/head', $data);
        //$this->load->view('index');
        $this->load->view('base/foot');
        echo "";
    }
}