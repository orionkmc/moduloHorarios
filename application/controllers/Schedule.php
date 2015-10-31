<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller 
{
	public function index()
	{
        $data['schedule'] = 'active';
        $data['physicalPlant'] = '';
        $data['reports'] = '';
		$this->load->view('base/head', $data);
		$this->load->view('index');
		$this->load->view('base/foot');
	}
}