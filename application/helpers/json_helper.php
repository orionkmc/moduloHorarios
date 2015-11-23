<?php 
    function add_json($json)
    {  
        foreach ($json as $key) 
        {
            $key->variable = 
            '<td>'.
                '<div class="row">'.
                    '<div class="col-xs-7 col-sm-7 col-md-6 col-lg-4"></div>'.
                    '<div class="col-xs-5 col-sm-5 col-md-6 col-lg-5 text-center">'.
                        '<a href="'.site_url('Class_room/view/'.$key->id) .'"><i class="fa fa-search fa-fw consultar" title="Ver Salones" ></i></a>'.
                        '<a href="'.site_url('Building/update/'.$key->id).'"><i class="fa fa-pencil fa-fw editar" title="Editar" ></i></a>'.
                        '<a onclick="return confirm('."'¿Estas seguro que deseas eliminar este edificio? Sus salones tambien seran eliminados'".');" href="'.site_url('Building/delete/'.$key->id) .'"><i class="fa fa-trash-o fa-fw eliminar" title="Eliminar"></i></a>'.
                    '</div>'.
                '</div>'.
            '</td>';
        }
        return $json;
    }