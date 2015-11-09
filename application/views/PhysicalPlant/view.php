
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sedes</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>CI</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                    </tr>
                </thead>

                <tbody>
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
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-center" title="Nuevo profesor" style="cursor: pointer" colspan="5"><i class="fa fa-plus fa-fw editar"></i></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    $(".dataTable").dataTable( {
  "responsive": true,
  "aLengthMenu": [[15, 30, -1], [15, 30, "Todos"]],
  "language": {
   "sProcessing": "Procesando...",
   "sLengthMenu": "_MENU_ elementos por página",
   "sZeroRecords": "No hay elementos",
   "sEmptyTable": "No hay elementos",
   "sInfo": "Total: _MAX_ elementos (_START_-_END_)",
   "sInfoEmpty": "No hay elementos",
   "sInfoFiltered": "(se encontraron _TOTAL_ coincidencias)",
   "sInfoPostFix": "",
   "sSearch": "Buscar:",
   "sUrl": "",
   "sInfoThousands": ",",
   "sLoadingRecords": "Cargando...",
   "oPaginate": {
    "sFirst": "<i class=\"fa fa-angle-double-left fa-fw\" title=\"Primera página\"></i>",
    "sLast": "<i class=\"fa fa-angle-double-right fa-fw\" title=\"Última página\"></i>",
    "sPrevious": "<i class=\"fa fa-angle-left fa-fw\" title=\"Anterior\"></i>",
    "sNext": "<i class=\"fa fa-angle-right fa-fw\" title=\"Siguiente\"></i>"
   },
   "oAria": {
    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
   }
  },
  "retrieve": true
 });
</script>