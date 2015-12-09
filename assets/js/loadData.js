function loadBuilding(site_url, headquarters)
{
    $.get(site_url+'/Building/Building/'+ headquarters, "", function(data)
    {
        var json = JSON.parse(data);
        var html = '<option value="0">Edificio</option>';
        for(post in json.data)
        {
            html+= '<option value="'+ json.data[post].id + '" >'+ json.data[post].name + '</option>';
        }
        $("#building").html(html);
    });
}