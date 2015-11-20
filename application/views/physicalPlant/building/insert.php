<script>
  $(document).ready(function()
    {
        var headquarters = $("#headquarters").val();
        if (headquarters == 0)
        {
            $("#building").attr("disabled","disabled");
            $("#submit").attr("disabled","disabled");
        };
        $("#headquarters").change(function()
        {
            var headquarters = $("#headquarters").val();
            if (headquarters == 0)
            {
                $("#building").attr("disabled","disabled");
                $("#submit").attr("disabled","disabled");
            };
            if(headquarters != 0)
            {
                $("#building").removeAttr("disabled");
                $("#submit").removeAttr("disabled");
            }
            $("#building").val("")
        });

        $("#building").keyup(function(){
            var headquarters = $("#headquarters").val();
            var building = $("#building").val()
            $.get("<?php echo site_url('Class_room/Building/"+ headquarters +"') ?>", "", function(data)
            {
                json = JSON.parse(data);
                for (i in json)
                {
                    if (building == json[i].edificio)
                    {
                        $("#building").css("border-color", "red");
                        $("#submit").attr("disabled","disabled");
                        return
                    };
                    if (building != json[i].edificio)
                    {
                        $("#building").css("border-color", "green");
                        $("#submit").removeAttr("disabled");
                    };

                }
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
                <select id="headquarters" class="form-control" name="headquarters" required="required">
                    <option value="0">Sede</option>
                    <?php foreach ($headquarters as $key): ?>
                        <option value="<?= $key->id ?>"><?= $key->nombre ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <?= form_input(array('name'=> 'building', 'id' => 'building', 'value' => '', 'class' => 'form-control','placeholder'=>'Nombre del Edificio')) ?>
                <p class="help-block">Debe colocar el nombre o vocal del edificio, Sin anteponer la palabra edificio. Ej: A</p>
            </div>
            <div class="form-group text-center">
                <input id="submit" type="submit" value="Guardar" class="btn btn-lg btn-primary" >
                <input type="button" value="Regresar" class="btn btn-lg">
                <input type="reset" value="reset" class="btn btn-lg">
            </div>
        <?= form_close() ?>
    </div>
</div>
