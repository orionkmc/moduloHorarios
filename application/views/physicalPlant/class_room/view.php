<script>
   $(document).ready(function()
    {
        var site_url = '<?= site_url() ?>';
        var headquarters = $("#headquarters").val()
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
            $("#more").attr("href", "<?= site_url(); ?>/Class_room/insert/"+ building);
            loadClass_roomDatatables(site_url, building);
        });

        $("#headquarters").change(function(){
            var headquarters = $("#headquarters").val();
            loadBuilding(site_url, headquarters);
        });

        $("#building").on("change",function(){
            var building = $("#building").val();
            $("#more").attr("href", "<?= site_url(); ?>/Class_room/insert/"+ building);
           loadClass_roomDatatables(site_url, building);
        });
    });
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Salones</h1>
    </div>
</div>

<div class="form-group">
    <select id="headquarters" class="form-control" autofocus="on">
        <option value="0">Sede</option>
        <?php foreach ($headquarters as $key): ?>
            <option value="<?= $key->id ?>" <?= (($current_building !=0) && ($key->id == $current_building[0]->headquarters))  ? "selected" : "" ?> ><?= $key->nombre ?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="form-group">
    <select id="building" class="form-control">
        <option value="">Edificio</option>
    </select>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table id="example" class="table table-striped table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                        <th>Tipo salon</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td class="text-center" title="Nuevo Salon" colspan="4">
                            <?= anchor('','<i class="fa fa-plus fa-fw editar"></i>', 'id="more"') ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
