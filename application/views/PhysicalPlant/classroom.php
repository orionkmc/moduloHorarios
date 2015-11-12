<script>
    $(document).ready(function()
    {
        $("#building").change(function(){
            var building = $("#building").val()
            $.get("<?php echo site_url('PhysicalPlant/getData/"+ building +"') ?>", "", function(data)
            {
                var json = JSON.parse(data);
                var html = "";
                for(post in json)
                {
                    html+=
                    '<tr>'+
                        '<td class="text-center">' + json[post].edificio + '</td>'+
                        '<td>'+
                            '<div class="row block-center">'+
                                '<div class="col-xs-7 col-sm-7 col-md-6 col-lg-6"></div>'+
                                '<div class="col-xs-5 col-sm-5 col-md-6 col-lg-6 block-center">'+
                                    '<i class="fa fa-search fa-fw consultar" title="Mas información" ></i>'+
                                    '<i class="fa fa-pencil fa-fw editar" title="Editar" ></i>'+
                                    '<i class="fa fa-trash-o fa-fw eliminar" title="Eliminar"></i>'+
                                '</div>'+
                            '</div>'+
                        '</td>'+
                    '</tr>';

                }
            $("tbody").html(html);
            });
        });
    });
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edificio</h1>
    </div>
</div>
<div class="form-group">
    <select name="" id="building" class="form-control">
        <option value="">Sede</option>
        <?php foreach ($classroom as $key): ?>
            <option value="<?= $key->id ?>"><?= $key->nombre ?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody></tbody>
                <tfoot>
                    <tr>
                        <td class="text-center" title="Nuevo profesor" style="cursor: pointer" colspan="5"><i class="fa fa-plus fa-fw editar"></i></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
