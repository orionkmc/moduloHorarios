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
        $_data['building'] = 'building';
        $this->load->view('base/head',$_data);
        $this->load->view('physicalPlant/building/view', $data);
        $this->load->view('base/foot');
    }

    public function insert($path=1)
    {
        $this->load->library('form_validation');
        if ($path == 1)
        {
            $data['headquarters'] = $this->Headquarters_model->get_all();
            $this->load->view('base/head');
            $this->load->view('physicalPlant/building/insert', $data);
            $this->load->view('base/foot');
        }
        elseif ($path == 2) 
        {
            $this->form_validation->set_message("greater_than[0]", "No has seleccionado ninguna %s.");
            $this->form_validation->set_message("required", "El campo %s es requerido.");

            $this->form_validation->set_rules('headquarters', 'Sede', 'greater_than[0]');
            $this->form_validation->set_rules('building', 'Edificio', 'required');
            if ($this->form_validation->run() == FALSE) 
            {
                $this->insert();
            }
            else
            {
                if ($this->Building_model->insert($this->input))
                {
                    redirect('Building/view/'.$this->input->post('headquarters'), 'refresh');
                }
                else
                {
                    echo "<script>alert('Los datos ya existen');</script>";
                    $this->insert();
                }
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

    public function update($update_Headquarters, $path = 1)
    {
        $this->load->library('form_validation');
        if ($path == 1)
        {
            $data['headquarters'] = $this->Headquarters_model->get_all();
            $data['update_Headquarters'] = $this->Building_model->get_by_id($update_Headquarters);
            $this->load->view('base/head');
            $this->load->view('physicalPlant/building/update', $data);
            $this->load->view('base/foot');
        }
        elseif ($path == 2) 
        {
            $this->form_validation->set_message("greater_than[0]", "No has seleccionado ninguna %s.");
            $this->form_validation->set_message("required", "El campo %s es requerido.");

            $this->form_validation->set_rules('headquarters', 'Sede', 'greater_than[0]');
            $this->form_validation->set_rules('building', 'Edificio', 'required');
            if ($this->form_validation->run() == FALSE) 
            {
                $this->update();
            }
            else
            {
                if ($this->Building_model->update($this->input))
                {
                    redirect('Building/view/'.$this->input->post('headquarters'), 'refresh');
                }
                else
                {
                    echo "<script>alert('Los datos ya existen');</script>";
                    $this->update();
                }
            }
        }
    }
}