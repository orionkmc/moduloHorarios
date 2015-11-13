<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller 
{
    public function index()
    {
        $this->load->view('base/head');
        $this->load->view('base/foot');
    }
}