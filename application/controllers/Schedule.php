<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model');
    }

	public function index($path = 1)
	{
        if ($path == 1) 
        {
            $data['begin'] = 1;
            $data['end'] = 7;
            $data['blockBegin'] = 1;
            $data['blockEnd'] = 19;
        }
        else
        {
            $data['begin'] = $this->input->post('begin');
            $data['end'] = $this->input->post('end');
            $data['blockBegin'] = $this->input->post('blockBegin');
            $data['blockEnd'] = $this->input->post('blockEnd');
        }
        $this->load->view('base/head');
        $data['schedule'] = $this->Schedule_model->get_all();
        $this->load->view('schedules/index', $data);
        $this->load->view('base/foot');
	}
}