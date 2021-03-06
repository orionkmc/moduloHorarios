<script>
    $(document).ready(function()
    {
        var site_url = '<?= site_url() ?>';

        var headquarters = $("#headquarters").val();
        loadBuildingDatatables(site_url, headquarters);

        $("#headquarters").on("ready change",function(){
            var headquarters = $("#headquarters").val()
            loadBuildingDatatables(site_url, headquarters);
        });
    });
</script>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edificios</h1>
    </div>
</div>

<div class="form-group">
    <select id="headquarters" class="form-control" autofocus="on">
        <option value="0">Sede</option>
        <?php foreach ($headquarters as $key): ?>
            <option value="<?= $key->id ?>" <?= ($key->id == $current_headquarters)  ? "selected" : "" ?>><?= $key->nombre ?></option>
        <?php endforeach ?>
    </select>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table id="example" class="table table-striped table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td class="text-center" title="Nuevo Edificio" colspan="3">
                            <?= anchor('Building/insert','<i class="fa fa-plus fa-fw editar"></i>') ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>