    function schedule_function(site_url)
    {
        var headquarters = $("#headquarters").val();
            $("#building").attr("disabled","disabled");
            $("#classroom_type").attr("disabled","disabled");
            $("#class_room").attr("disabled","disabled");
            $("#submit").attr("disabled","disabled");

            $("#headquarters").change(function(){
                var headquarters = $("#headquarters").val()
                if (headquarters == 0) 
                {
                    $("#building").val(0);
                    $("#classroom_type").val(0);
                    $("#class_room").val(0);
                };
                $.get( site_url + "/Building/data_building/"+ headquarters, "", function(data)
                {
                    var json = JSON.parse(data);
                    var html = '<option value="0">Edificio</option>';
                    for(post in json)
                    {
                        html+=
                        '<option value="'+ json[post].id + '" >'+
                        json[post].name +
                        '</option>';
                    }
                    $("#building").html(html);

                    $('#building').on("change", function(){
                        var building = $("#building").val();
                        
                        if (building == 0) 
                        {
                            $("#classroom_type").val(0);
                            $("#class_room").val(0);
                        };
                        $.get(site_url + "/Class_room/class_room/"+ building+"/2", "", function(data)
                        {
                            json = JSON.parse(data);
                            var html = '<option value="0">Tipo de Salon</option>';
                            for(post in json.data)
                            {
                                html+=
                                '<option value="'+ json.data[post].classroom_type + '" >'+
                                json.data[post].name +
                                '</option>';
                            }
                            $("#classroom_type").html(html);

                            $('#classroom_type').on("change", function(){
                                var classroom_type = $("#classroom_type").val();
                                if (classroom_type == 0) 
                                {
                                    $("#classroom_type").val(0);
                                    $("#class_room").val(0);
                                };
                                $.get(site_url + "/Class_room/class_room_forBC/"+ building + "/" + classroom_type, "", function(data)
                                {
                                    json = JSON.parse(data);
                                    var html = '<option value="0">Salon</option>';
                                    for(post in json.data)
                                    {
                                        html+=
                                        '<option value="'+ json.data[post].id + '" >'+
                                        json.data[post].name +
                                        '</option>';
                                    }
                                    $("#class_room").html(html);
                                });
                            });
                        });
                    });
                });
            });

        sample_hidden(['#headquarters', "#building","#classroom_type","#class_room"]);
        sample_hidden(['#building', "#classroom_type","#class_room"]);
        sample_hidden(['#classroom_type', "#class_room"]);
        function sample_hidden(a)
        {
            $(a[0]).on("change", function(){
                var changeful = $(a[0]).val();
                if (changeful == 0)
                {
                    $(a[1]).attr("disabled","disabled");
                    $(a[2]).attr("disabled","disabled");
                    $(a[3]).attr("disabled","disabled");
                    $("#submit").attr("disabled","disabled");
                }
                else if(changeful != 0)
                {
                    $(a[1]).removeAttr("disabled");
                };
            });
        }
    }  