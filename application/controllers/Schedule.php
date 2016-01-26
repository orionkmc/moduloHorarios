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
        $_data['schedule'] = 'schedule';
        $this->load->view('base/head', $_data);
        $data['schedule'] = $this->Schedule_model->get(1);
        $data['headquarters'] = $this->Headquarters_model->get_all();
        $this->load->view('schedules/index', $data);
        $this->load->view('base/foot');

        /*$c = 134;
        $k = 1;
        for ($i=1; $i <= 19  ; $i++) { 
            for ($j=1; $j <= 7; $j++) {
                echo "INSERT INTO schedule VALUES ('$c','$c', 2 ,'$i','$j');</br>";
                $c++;
                $k++;
            }
        }*/
	}

    public function data_schedule($classroom)
    {
        $post = $this->Schedule_model->get($classroom);
        echo '{"data":',  json_encode($post),'}';
    }
}