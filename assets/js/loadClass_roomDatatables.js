function loadClass_roomDatatables(site_url, building)
{
    $('#example').DataTable({
        "destroy": true,
        "ajax": site_url + '/Class_room/class_room/'+ building,
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "classroom_type" },
            { "data": "variable" }
        ]
    });
}