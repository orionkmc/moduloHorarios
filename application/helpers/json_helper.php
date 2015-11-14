<?php 
    function add_json($json)
    {  
        foreach ($json as $key) 
        {
            $key->variable = 'dato';
        }
        return $json;
    }