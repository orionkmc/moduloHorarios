<script>
    $(document).ready(function()
    {
        var headquarters = $("#headquarters").val();
        if (headquarters == 0)
        {
            $("#building").attr("disabled","disabled");
            $("#submit").attr("disabled","disabled");
        };

        $("#headquarters").on("change", function(){
            var headquarters = $("#headquarters").val();
            if (headquarters == 0)
            {
                $("#building").attr("disabled","disabled");
                $("#submit").attr("disabled","disabled");
            }
            else if(headquarters != 0)
            {
                $("#building").removeAttr("disabled");
            };

            $("#building").val("")
            $("#building1").attr("class", "form-group has-feedback");
            $("#building3").attr("class", "glyphicon glyphicon-pencil form-control-feedback");

            $.get("<?php echo site_url('Class_room/Building/"+ headquarters +"') ?>", "", function(data)
            {
                json = JSON.parse(data);
                $("#building").keyup(function(){
                    var building = $("#building").val();

                    if(building == '')
                    {
                        $("#building1").attr("class", "form-group has-feedback");
                        $("#building3").attr("class", "glyphicon glyphicon-pencil form-control-feedback");
                        $("#submit").attr("disabled","disabled");
                    };

                    if((json.length === 0)&&(building != ''))
                    {
                        $("#building1").attr("class", "form-group has-success has-feedback");
                        $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                        $("#submit").removeAttr("disabled");
                    }
                    for (i in json)
                    {
                        if (json[i].edificio == building)
                        {
                            $("#building1").attr("class", "form-group has-error has-feedback");
                            $("#building3").attr("class", "glyphicon glyphicon-remove form-control-feedback");
                            $("#submit").attr("disabled","disabled");
                            return false;
                        };

                        if ((json[i].edificio != building) && (building != ''))
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
</script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Nuevo Edificio</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        
        <?= form_open("Building/insert/2") ?>
            <div class="form-group">
                <select id="headquarters" class="form-control" name="headquarters" required="required" autofocus="on">
                    <option value="0">Sede</option>
                    <?php foreach ($headquarters as $key): ?>
                        <option value="<?= $key->id ?>"><?= $key->nombre ?></option>
                    <?php endforeach ?>
                </select>
                <br>
                <?php if (form_error('headquarters')): ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <?= form_error('headquarters') ?>
                    </div>
                <?php endif ?>
            </div>

            <div id="building1" class="form-group has-feedback">
                <?= form_input(array('name'=> 'building', 'id' => 'building', 'value' => '', 'class' => 'form-control','placeholder'=>'Nombre del Edificio')) ?>
                <span id="building3" class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                <p class="help-block">Debe colocar el nombre o vocal del edificio, Sin anteponer la palabra edificio. Ej: A</p>
                <?php if (form_error('building')): ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <?= form_error('building') ?>
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
