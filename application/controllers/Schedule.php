<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model');
        $this->load->model('Headquarters_model');
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
        $_data['schedule'] = 'schedule';
        $this->load->view('base/head', $_data);
        $data['schedule'] = $this->Schedule_model->get_all();
        $data['headquarters'] = $this->Headquarters_model->get_all();
        $this->load->view('schedules/index', $data);
        $this->load->view('base/foot');
        /*$c = 1;
        for ($i=1; $i <= 19  ; $i++) { 
            for ($j=1; $j <= 7; $j++) { 
                echo "INSERT INTO horario_prueba VALUES ('$c','$c','$i','$j');</br>";
                $c++;
            }
        }*/
	}
}