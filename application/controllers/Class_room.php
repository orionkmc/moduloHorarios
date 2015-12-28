<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_room extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Headquarters_model');
        $this->load->model('Building_model');
        $this->load->model('Class_room_model');
        $this->load->model('ClassroomType_model');
    }
    public function view($current_building = 0)
    {
        $data['headquarters']     = $this->Headquarters_model->get_all();
        $data['current_building'] = $this->Building_model->get_by_id($current_building);
        $_data['class_room'] = 'class_room';
        $this->load->view('base/head',$_data);
        $this->load->view('physicalPlant/class_room/view', $data);
        $this->load->view('base/foot');
    }

    public function insert($current_building = 0, $path = 1)
    {
        $this->load->library('form_validation');
        if ($path == 1)
        {
            $data['headquarters'] = $this->Headquarters_model->get_all();
            $data['current_building'] = $this->Building_model->get_by_id($current_building);
            $data['classroomType'] = $this->ClassroomType_model->get_all();
            $this->load->view('base/head');
            $this->load->view('physicalPlant/class_room/insert', $data);
            $this->load->view('base/foot');
        }
        elseif ($path == 2)
        {
            $this->form_validation->set_message("greater_than", "No has seleccionado ningun %s.");
            $this->form_validation->set_message("required", "El campo %s es requerido.");

            $this->form_validation->set_rules('headquarters', 'Sede', 'required');
            $this->form_validation->set_rules('building', 'Edificio', 'required');
            $this->form_validation->set_rules('classroom_type', 'Tipo de Salon', 'greater_than[0]');
            $this->form_validation->set_rules('class_room', 'Salon', 'required');
            if ($this->form_validation->run() == FALSE) 
            {
                $this->insert();
            }
            else
            {
                if ($this->Class_room_model->insert($this->input))
                {
                    redirect('Class_room/view/'.$this->input->post('building'), 'refresh');
                }
                else
                {
                    echo "<script>alert('Los datos ya existen');</script>";
                    $this->insert();
                }
            }
        }
    }

    /*movi la funcion building para el controlador building ARREGLAR*/

    public function class_room($building, $path = 1)
    {
        $this->load->helper('json_classroom');
        $post = $this->Class_room_model->get($building, $path);
        $datatables = add_json($post);
        echo '{"data":',  json_encode($post),'}';
    }

    public function class_room_forBC($building, $classroom_type)
    {
        $post = $this->Class_room_model->class_room_forBC($building, $classroom_type);
        echo '{"data":',  json_encode($post),'}';
    }

    public function delete($id)
    {
        $this->Class_room_model->delete($id);
        redirect('Class_room/view', 'refresh');
    }

    public function update($id)
    {
        echo "Registro". $id . "Modificado";
    }
}