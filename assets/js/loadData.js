function loadBuilding(site_url, headquarters)
{
    $.get(site_url+'/Class_room/Building/'+ headquarters, "", function(data)
    {
        var json = JSON.parse(data);
        var html = '<option value="0">Edificio</option>';
        for(post in json)
        {
            html+= '<option value="'+ json[post].id + '" >'+ json[post].edificio + '</option>';
        }
        $("#building").html(html);
    });
}