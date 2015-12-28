<script>
    $(document).ready(function()
    {
        /*cuando no hay una sede ni salon seleccionado*/
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
                $.get("<?php echo site_url('Building/Building/"+ headquarters +"') ?>", "", function(data)
                {
                    var json = JSON.parse(data);
                    var html = '<option value="0">Edificio</option>';
                    for(post in json.data)
                    {
                        html+=
                        '<option value="'+ json.data[post].id + '" >'+
                        json.data[post].name +
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
                                    if ((json.data[i].classroom_type == classroom_type) && (json.data[i].name == class_room))
                                    {
                                        $("#building1").attr("class", "form-group has-error has-feedback");
                                        $("#building3").attr("class", "glyphicon glyphicon-remove form-control-feedback");
                                        $("#submit").attr("disabled","disabled");
                                        return 0;
                                    };

                                    if ((json.data[i].classroom_type != classroom_type) && (json.data[i].name == class_room))
                                    {
                                        $("#building1").attr("class", "form-group has-success has-feedback");
                                        $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                                        $("#submit").removeAttr("disabled");
                                    };

                                    if ((json.data[i].name != class_room) && (class_room != ''))
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
        /*cuando se quiere insertar un salon y hay una sede y un salon seleccionado*/
        else if(headquarters != 0)
        {
            $("#headquarters").attr("disabled","disabled");
            $("#building").attr("disabled","disabled");
            $("#class_room").attr("disabled","disabled");
            $("#submit").attr("disabled","disabled");
            $.get("<?php echo site_url('Building/Building/"+ headquarters +"') ?>", "", function(data)
            {
                var json = JSON.parse(data);
                var html = '<option value="0">Edificio</option>';
                for(post in json.data)
                {
                    html += '<option value="' + json.data[post].id + '"' + ((json.data[post].id == <?= isset($current_building[0]->id) ? $current_building[0]->id : 0 ?>) ? ' selected="selected" ' : '') + '>' + json.data[post].name + '</option>';
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
                        /*no hay nada q validar, se coloca el lapiz*/
                        if(class_room == '')
                        {
                            $("#building1").attr("class", "form-group has-feedback");
                            $("#building3").attr("class", "glyphicon glyphicon-pencil form-control-feedback");
                            $("#submit").attr("disabled","disabled");
                        };

                        /*cuando un edificio no tiene asignado ningun salon*/
                        if((json.data.length === 0)&&(class_room != ''))
                        {
                            $("#building1").attr("class", "form-group has-success has-feedback");
                            $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                            $("#submit").removeAttr("disabled");
                        }
                        for (i in json.data)
                        {
                            console.log(json.data[i].classroom_type + " = " + classroom_type + " && " + class_room + " = " + json.data[i].name);
                            if ((json.data[i].classroom_type == classroom_type) && (json.data[i].name == class_room))
                            {
                                $("#building1").attr("class", "form-group has-error has-feedback");
                                $("#building3").attr("class", "glyphicon glyphicon-remove form-control-feedback");
                                $("#submit").attr("disabled","disabled");
                                return 0;
                            };

                            if ((json.data[i].classroom_type != classroom_type) && (json.data[i].name == class_room))
                            {
                                $("#building1").attr("class", "form-group has-success has-feedback");
                                $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                                $("#submit").removeAttr("disabled");
                            };

                            if ((json.data[i].name != class_room) && (class_room != ''))
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
        
    });
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
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Nuevo Salon</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= form_open("Class_room/insert/0/2") ?>
            <?= form_input(array('id' => 'building_hidden', 'type' => 'hidden', 'name' => 'building')) ?>
            <div class="form-group">
                <select id="headquarters" class="form-control" <?= $current_building == 0 ? 'autofocus="on"': ''?>>
                    <option value="0">Sede</option>
                    <?php foreach ($headquarters as $key): ?>
                        <option value="<?= $key->id ?>" <?= (($current_building !=0) && ($key->id == $current_building[0]->headquarters))  ? "selected" : "" ?> ><?= $key->nombre ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <select id="building" class="form-control" name="building">
                    <option value="">Edificio</option>
                </select>
            </div>

            <div class="form-group row">
                <div id="box_classroom_type" class="col-md-11">
                    <select id="classroom_type" class="form-control" name="classroom_type" <?= $current_building != 0 ? 'autofocus="on"': ''?>>
                        <option value="0">Tipo de Salon</option>
                        <?php foreach ($classroomType as $key): ?>
                            <option value="<?= $key->id ?>"><?= $key->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-default btn-block"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            
            <div id="building1" class="form-group has-feedback">
                <?= form_input(array('name'=> 'class_room', 'id' => 'class_room', 'value' => '', 'class' => 'form-control','placeholder'=>'Nombre del Salon')) ?>
                <span id="building3" class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                <p class="help-block">Debe colocar el numero o nombre del salon, Sin anteponer la palabra salon. Ej: 1</p>
                <?php if (form_error('class_room')): ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <?= form_error('class_room') ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="form-group text-center">
                <input id="submit" type="submit" value="Guardar" class="btn btn-lg btn-primary" >
                <input type="button" value="Regresar" class="btn btn-lg">
            </div>
        <?= form_close() ?>
    </div>
</div>