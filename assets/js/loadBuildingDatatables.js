//inicio carga los edificios x ajax
function loadBuildingDatatables(site_url, headquarters)
    {
        $('#example').DataTable({
            "destroy": true,
            "ajax": site_url + '/Building/building/'+ headquarters,
            "columns": [
                { "data": "id" },
                { "data": "edificio" },
                { "data": "variable" }
            ]
        });
    }
//fin carga los edificios x ajax
