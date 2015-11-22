//inicio carga los edificios x ajax
function loadData()
{
    var headquarters = $("#headquarters").val()
    $('#example').DataTable({
        "destroy": true,
        "ajax": '<?php echo base_url(); ?>index.php/Building/building/'+ headquarters,
        "columns": [
            { "data": "id" },
            { "data": "edificio" },
            { "data": "variable" }
        ]
    });
}
//fin carga los edificios x ajax