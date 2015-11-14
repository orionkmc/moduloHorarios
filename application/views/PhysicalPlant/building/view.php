<script>
var dataSet = [
    [ "Tiger Nixon", "System Architect"],
];
   $(document).ready(function()
    {
        $("#headquarters").on("change",function(){
            var headquarters = $("#headquarters").val()
            $('#example').DataTable({
                "destroy": true,
                "ajax": "building/"+headquarters,
                "columns": [

                    { "data": "id" },
                    { "data": "edificio" }
                ]
            });
        });
    })
</script>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edificios</h1>
    </div>
</div>

<div class="form-group">
    <select id="headquarters" class="form-control">
        <option value="">Sede</option>
        <?php foreach ($headquarters as $key): ?>
            <option value="<?= $key->id ?>"><?= $key->nombre ?></option>
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
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<!-- <tbody>
                    <tr>
                        <td>kuai</td>
                        <td>kuai</td>
                        <td>kuai</td>
                        <td>kuai</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-7 col-sm-7 col-md-6 col-lg-7"></div>
                                <div class="col-xs-5 col-sm-5 col-md-6 col-lg-5 text-center">
                                    <i class="fa fa-search fa-fw consultar" title="Mas información" ></i>
                                    <i class="fa fa-pencil fa-fw editar" title="Editar" ></i>
                                    <i class="fa fa-trash-o fa-fw eliminar" title="Eliminar"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody> -->