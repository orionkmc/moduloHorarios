<script>
   $(document).ready(function()
    {
        var headquarters = $("#headquarters").val()
        $.get("<?php echo site_url('Class_room/Building/"+ headquarters +"') ?>", "", function(data)
        {
            var json = JSON.parse(data);
            var html = '<option value="0">Edificio</option>';
            for(post in json)
            {   
                html += '<option value="' + json[post].id + '"' + ((json[post].id == <?= isset($current_building[0]->id) ? $current_building[0]->id : 0 ?>) ? ' selected="selected" ' : '') + '>' + json[post].edificio + '</option>';
            }
            $("#building").html(html);
            load_building();
        });

        $("#headquarters").change(function(){
            var headquarters = $("#headquarters").val()
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
            });
        });

        $("#building").on("change",function(){
           load_building();
        });
    });
    function load_building()
    {
        var building = $("#building").val();
        $("#more").attr("href", "<?= site_url(); ?>/Class_room/insert/"+ building);
            $('#example').DataTable({
                "destroy": true,
                "ajax": '<?= base_url(); ?>index.php/Class_room/class_room/'+ building,
                "columns": [
                    { "data": "id" },
                    { "data": "salon" },
                    { "data": "tipo" }
                ]
            });
    }
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
            <option value="<?= $key->id ?>" <?= (($current_building !=0) && ($key->id == $current_building[0]->id_sede))  ? "selected" : "" ?> ><?= $key->nombre ?></option>
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
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td class="text-center" title="Nuevo Salon" colspan="3">
                            <?= anchor('','<i class="fa fa-plus fa-fw editar"></i>', 'id="more"') ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
