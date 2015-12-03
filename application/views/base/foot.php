
        </div>
    </div>
</div>
</div>
<!-- Fin contenido -->

<div id="popUp" class="infoZone" onClick="popUpClose()">
    <span class="cerrar" title="Cerrar">X</span>
    <span class="fa-stack fa-2x" style="position: absolute; bottom: 0.2em; right: 0.2em;">
        <i class="fa fa-circle-o fa-fw fa-stack-2x"></i>
        <i></i> 
    </span>
</div>
<i id="loading" class="fa fa-refresh fa-spin fa-3x fa-fw infoZone" title="Cargando.."></i>
<!-- Bibliotecas plantilla -->

<script src="<?= base_url('../css/template/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('../css/template/bower_components/metisMenu/dist/metisMenu.min.js') ?>"></script>
<script src="<?= base_url('../css/template/dist/js/sb-admin-2.js') ?>"></script>
<script src="<?= base_url('../css/template/bower_components/datatables/media/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('../css/template/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?= base_url('../css/template/bower_components/datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('../css/template/bower_components/datepicker/locales/bootstrap-datepicker.es.min.js') ?>"></script>
<script src="<?= base_url('../lib/sigpa.js') ?>"></script>

<script>
    $(document).ready(loading(false));
    formularios();
</script>

<script>
$(document).ready(function(){
    $(".dataTable").dataTable( {
    "responsive": true,
    "aLengthMenu": [[15, 30, -1], [15, 30, "Todos"]],
    "language":  {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "_MENU_ elementos por página",
        "sZeroRecords":    "No hay elementos",
        "sEmptyTable":     "No hay elementos",
        "sInfo":           "Total: _MAX_ elementos (_START_-_END_)",
        "sInfoEmpty":      "No hay elementos",
        "sInfoFiltered":   "(se encontraron _TOTAL_ coincidencias)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "<i class=\"fa fa-angle-double-left fa-fw\" title=\"Primera página\"></i>",
            "sLast":     "<i class=\"fa fa-angle-double-right fa-fw\" title=\"Última página\"></i>",
            "sPrevious": "<i class=\"fa fa-angle-left fa-fw\" title=\"Anterior\"></i>",
            "sNext":     "<i class=\"fa fa-angle-right fa-fw\" title=\"Siguiente\"></i>"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    "retrieve": true
});
});
</script>
<!-- Fin bibliotecas plantilla -->
</body>
</html>