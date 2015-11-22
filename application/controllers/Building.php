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
    public function view($current_headquarters = 0)
    {
        $data['headquarters'] = $this->Headquarters_model->get_all();
        $data['current_headquarters'] = $current_headquarters;
        $this->load->view('base/head');
        $this->load->view('physicalPlant/building/view', $data);
        $this->load->view('base/foot');
    }
    public function insert($path=1)
    {
        if ($path == 1)
        {
            $data['headquarters'] = $this->Headquarters_model->get_all();
            $this->load->view('base/head');
            $this->load->view('physicalPlant/building/insert', $data);
            $this->load->view('base/foot');
        }
        elseif ($path == 2) 
        {
            /*$this->form_validation->set_rules('Name', 'Name', 'required');
            $this->form_validation->set_rules('Rif', 'R.I.F.', 'required');*/

            if ($this->Building_model->insert($this->input))
            {
                redirect('Building/view/'.$this->input->post('headquarters'), 'refresh');
            }
        }
    }
    public function building($_id)
    {
        $this->load->helper('json');
        $post = $this->Building_model->get($_id);
        $datatables = add_json($post);
        echo '{"data":',  json_encode($datatables),'}';
    }
    public function delete($id)
    {
        $this->Building_model->delete($id);
        redirect('Building/view', 'refresh');
    }
}