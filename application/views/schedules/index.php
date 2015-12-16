<script>
    $(document).ready(function()
    {
        modal_left();
        
        var site_url = '<?= site_url() ?>';
        var kuai = schedule_function(site_url);
        $('#class_room').on("change", function(){
            var kuai = $("#class_room").val();
            console.log(kuai);

            var begin = <?= $begin ?>;
            var end = <?= $end ?>;
            var blockBegin = <?= $blockBegin ?>;
            var blockEnd = <?= $blockEnd ?>;
            var schedule = <?= json_encode($schedule) ?>;
            calendar(begin, end, blockBegin, blockEnd, schedule);
        });
    });
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sede:Ejido-Edificio:"A"-Salon:1 </h1><br>
        </div>
    </div>
    <div id="calendar"></div>


    <div id="modal">
        <div class="col-lg-12">
        <input id="cerrar-modal" name="modal" type="radio" value="cerrar" /> 
        <label for="cerrar-modal" class="cerrar" title="Cerrar"><i class="fa fa-times"></i></label>
            <?= form_open("Building/insert/2") ?>
                <h3 class="page-header">Filtrar Salon</h3>
                <div class="form-group">
                    <select id="headquarters" class="form-control" name="headquarters" required="required" autofocus="on">
                        <option value="0">Sede</option>
                        <?php foreach ($headquarters as $key): ?>
                            <option value="<?= $key->id ?>"><?= $key->nombre ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <select id="building" class="form-control" name="building" required="required" autofocus="on">
                        <option value="0">Edificio</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <select id="classroom_type" class="form-control" name="classroom_type" required="required" autofocus="on">
                        <option value="0">Tipo de Salon</option>
                    </select>
                </div>

                <div class="form-group">
                    <select id="class_room" class="form-control" name="class_room" required="required" autofocus="on">
                        <option value="0">Salon</option>
                    </select>
                </div>
            <?= form_close() ?>
            <label id="label-mostrar-modal" for="mostrar-modal"></label>
            <input id="mostrar-modal" name="modal" type="radio" value="mostrar" />
        </div>
        
        <form id="form_schedule" action="<?= site_url('Schedule/index/2') ?>" method="post">
        <h3 class="page-header">Cambiar dias y horas</h3>
            <div class="form-group">
                <label for="">Dias</label>
                <select name="begin" class="form-control">
                    <option value="0">Desde</option>
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miercoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                    <option value="6">Sabado</option>
                    <option value="7">Domingo</option>
                </select>
            </div>
            <div class="form-group">
                <select name="end" class="form-control">
                    <option value="0">Hasta</option>
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miercoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                    <option value="6">Sabado</option>
                    <option value="7">Domingo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Horas</label>
                <select name="blockBegin" class="form-control">
                    <option value="0">Desde</option>
                    <?php for ($i=1; $i<=19; $i++ ) : ?>
                        <option value="<?= $i ?>">bloque <?= $i ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="form-group">
                <select name="blockEnd" class="form-control">
                    <option value="0">Hasta</option>
                    <?php for ($i=1; $i<=19; $i++ ) : ?>
                        <option value="<?= $i ?>">bloque <?= $i ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <input id="k" class="btn btn-primary" type="submit" value="enviar">
        </form>
    </div>