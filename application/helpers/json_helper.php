<?php 
    function add_json($json)
    {  
        foreach ($json as $key) 
        {
            $key->variable = '<td><div class="row"><div class="col-xs-7 col-sm-7 col-md-6 col-lg-7"></div><div class="col-xs-5 col-sm-5 col-md-6 col-lg-5 text-center"><i class="fa fa-search fa-fw consultar" title="Mas información" ></i><i class="fa fa-pencil fa-fw editar" title="Editar" ></i><i class="fa fa-trash-o fa-fw eliminar" title="Eliminar"></i></div></div></td>';
        }
        return $json;
    }