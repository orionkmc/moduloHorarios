<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Headquarters_model');
        $this->load->model('Building_model');
        $this->load->model('Class_room_model');
    }
    public function view()
    {
        $data['headquarters'] = $this->Headquarters_model->get_all();
        $this->load->view('base/head', $data);
        $this->load->view('PhysicalPlant/room/view', $data);
        $this->load->view('base/foot');
    }
    
    public function building($_id)
    {
        $post = $this->Building_model->get($_id);
        echo json_encode($post);
    }

    public function class_room($_id)
    {
        $post = $this->Class_room_model->get($_id);
        echo '{"data":',  json_encode($post),'}';
    }
}