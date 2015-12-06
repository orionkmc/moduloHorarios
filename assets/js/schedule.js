function schedule_function()
    {
        var headquarters = $("#headquarters").val();
        if (headquarters == 0)
        {
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
                    $("#class_room").val("");
                    $("#building1").attr("class", "form-group has-feedback");
                    $("#building3").attr("class", "glyphicon glyphicon-pencil form-control-feedback");
                };
                $.get("<?php echo site_url('Class_room/Building/"+ headquarters +"') ?>", "", function(data)
                {
                    var json = JSON.parse(data);
                    var html = '<option value="0">Edificio</option>';
                    for(post in json)
                    {
                        html+=
                        '<option value="'+ json[post].id + '" >'+
                        json[post].edificio +
                        '</option>';
                    }
                    $("#building").html(html);

                    $('#building').on("change", function(){
                        var building = $("#building").val();
                        
                        if (building == 0) 
                        {
                            $("#classroom_type").val(0);
                            $("#class_room").val("");
                            $("#building1").attr("class", "form-group has-feedback");
                            $("#building3").attr("class", "glyphicon glyphicon-pencil form-control-feedback");
                        };
                        $.get("<?php echo site_url('Class_room/class_room/"+ building +"') ?>", "", function(data)
                        {
                            json = JSON.parse(data);
                            $("#class_room").keyup(function(){
                                var class_room = $("#class_room").val();
                                var classroom_type = $("#classroom_type").val();
                                if(class_room == '')
                                {
                                    $("#building1").attr("class", "form-group has-feedback");
                                    $("#building3").attr("class", "glyphicon glyphicon-pencil form-control-feedback");
                                    $("#submit").attr("disabled","disabled");
                                };

                                if((json.data.length === 0)&&(class_room != ''))
                                {
                                    $("#building1").attr("class", "form-group has-success has-feedback");
                                    $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                                    $("#submit").removeAttr("disabled");
                                }
                                for (i in json.data)
                                {
                                    if ((json.data[i].tipo == classroom_type) && (json.data[i].salon == class_room))
                                    {
                                        $("#building1").attr("class", "form-group has-error has-feedback");
                                        $("#building3").attr("class", "glyphicon glyphicon-remove form-control-feedback");
                                        $("#submit").attr("disabled","disabled");
                                    };

                                    if ((json.data[i].tipo != classroom_type) && (json.data[i].salon == class_room))
                                    {
                                        $("#building1").attr("class", "form-group has-success has-feedback");
                                        $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                                        $("#submit").removeAttr("disabled");
                                    };

                                    if ((json.data[i].salon != class_room) && (class_room != ''))
                                    {
                                        $("#building1").attr("class", "form-group has-success has-feedback");
                                        $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                                        $("#submit").removeAttr("disabled");
                                    };
                                }
                            });
                        });
                    });
                });
            });
        }
        else if(headquarters != 0)
        {
            $("#headquarters").attr("disabled","disabled");
            $("#building").attr("disabled","disabled");
            $("#class_room").attr("disabled","disabled");
            $("#submit").attr("disabled","disabled");
            $.get("<?php echo site_url('Class_room/Building/"+ headquarters +"') ?>", "", function(data)
            {
                var json = JSON.parse(data);
                var html = '<option value="0">Edificio</option>';
                for(post in json)
                {   
                    
                }
                $("#building").html(html);

                var building = $("#building").val();
                $("#building_hidden").attr("value", building);
                $.get("<?php echo site_url('Class_room/class_room/"+ building +"') ?>", "", function(data)
                {
                    json = JSON.parse(data);
                    $("#class_room").keyup(function(){
                        var class_room = $("#class_room").val();
                        var classroom_type = $("#classroom_type").val();
                        if(class_room == '')
                        {
                            $("#building1").attr("class", "form-group has-feedback");
                            $("#building3").attr("class", "glyphicon glyphicon-pencil form-control-feedback");
                            $("#submit").attr("disabled","disabled");
                        };

                        if((json.data.length === 0)&&(class_room != ''))
                        {
                            $("#building1").attr("class", "form-group has-success has-feedback");
                            $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                            $("#submit").removeAttr("disabled");
                        }
                        for (i in json.data)
                        {
                            if ((json.data[i].tipo == classroom_type) && (json.data[i].salon == class_room))
                            {
                                $("#building1").attr("class", "form-group has-error has-feedback");
                                $("#building3").attr("class", "glyphicon glyphicon-remove form-control-feedback");
                                $("#submit").attr("disabled","disabled");
                            };

                            if ((json.data[i].tipo != classroom_type) && (json.data[i].salon == class_room))
                            {
                                $("#building1").attr("class", "form-group has-success has-feedback");
                                $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                                $("#submit").removeAttr("disabled");
                            };

                            if ((json.data[i].salon != class_room) && (class_room != ''))
                            {
                                $("#building1").attr("class", "form-group has-success has-feedback");
                                $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                                $("#submit").removeAttr("disabled");
                            };
                        }
                    });
                });
            });
        };
        $('#classroom_type').on("change", function(){
            var classroom_type = $("#classroom_type").val();
            if (classroom_type== 0) 
            {
                $("#class_room").val("");
                $("#building1").attr("class", "form-group has-feedback");
                $("#building3").attr("class", "glyphicon glyphicon-pencil form-control-feedback");
            };
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