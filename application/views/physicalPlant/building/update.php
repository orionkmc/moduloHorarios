<script>
    $(document).ready(function()
    {
        var headquarters = $("#headquarters").val();
        $("#building1").attr("class", "form-group has-success has-feedback");
        $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");

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
                    if ((json[i].edificio == building) && (building != '<?= $update_Headquarters[0]->edificio ?>'))
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

                    if ((building == '<?= $update_Headquarters[0]->edificio ?>')) 
                    {
                        $("#building1").attr("class", "form-group has-success has-feedback");
                        $("#building3").attr("class", "glyphicon glyphicon-ok form-control-feedback");
                        $("#submit").removeAttr("disabled");
                    };
                }
            });
        });
    });
</script>
<?php if (isset($update_Headquarters)): ?>
    <script>
    $(document).ready(function()
    {
        $("#headquarters").attr("disabled","disabled");
    });
    </script>
<?php endif ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Nuevo Edificio</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php $hidden = array('headquarters' => $update_Headquarters[0]->id_sede, 'id' => $update_Headquarters[0]->id) ?>
        <?= form_open("Building/update/". $update_Headquarters[0]->id ."/2","",$hidden) ?>
            <div class="form-group">
                <select id="headquarters" class="form-control" name="headquarters">
                    <option value="0">Sede</option>
                    <?php foreach ($headquarters as $key): ?>
                        <option value="<?= $key->id ?>" <?= ($key->id == $update_Headquarters[0]->id_sede) ?'selected' :'' ?>><?= $key->nombre ?></option>
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
                <?= form_input(array('name'=> 'building', 'id' => 'building', 'value' => $update_Headquarters[0]->edificio, 'class' => 'form-control','placeholder'=>'Nombre del Edificio', 'autofocus'=>'on')) ?>
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
