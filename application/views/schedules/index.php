<script>
    $(document).ready(function()
    {
        modal_left();
        
        var site_url = '<?= site_url() ?>';
        schedule_function(site_url);

        var begin = $("#begin option:selected").val();
        var end = $("#end option:selected").val();
        var blockBegin = $("#blockBegin option:selected").val();
        var blockEnd = $("#blockEnd option:selected").val();
        var schedule = <?= '{"data":',  json_encode($schedule),'}' ?>;
        calendar(begin, end, blockBegin, blockEnd, schedule);

        $('td').click(function(e){ 
            var id = e.target.id;
            $('#exampleModalLabel').html(id);

            $('#id_schedule').attr('value', id);
        });


        $('#class_room').on("change", function(){
            var headquarters = $("#headquarters option:selected").text();
            var building = $("#building option:selected").text();
            var class_room = $("#class_room option:selected").val();
            var class_room_name = $("#class_room option:selected").text();
            $( ".title" ).html( "sede: " + headquarters + ", Edificio: " + building + ", Salon: " + class_room_name );

            $.get("<?php echo site_url('Schedule/data_schedule/"+ class_room +"') ?>", "", function(data)
            {
                var begin = $("#begin option:selected").val();
                var end = $("#end option:selected").val();
                var blockBegin = $("#blockBegin option:selected").val();
                var blockEnd = $("#blockEnd option:selected").val();
                var schedule = JSON.parse(data);
                calendar(begin, end, blockBegin, blockEnd, schedule);
                    $('td').click(function(e){ 
                    var id = e.target.id;
                    $('#exampleModalLabel').html(id);
                });
            });
        });           

        $('#begin, #end, #blockBegin, #blockEnd').on("change", function(){
            var begin = $("#begin option:selected").val();
            var end = $("#end option:selected").val();
            var blockBegin = $("#blockBegin option:selected").val();
            var blockEnd = $("#blockEnd option:selected").val();

            var headquarters = $("#headquarters option:selected").text();
            var building = $("#building option:selected").text();
            var class_room = $("#class_room option:selected").val();
            var class_room_name = $("#class_room option:selected").text();
            $( ".title" ).html( "sede: " + headquarters + ", Edificio: " + building + ", Salon: " + class_room_name );
            $.get("<?php echo site_url('Schedule/data_schedule/"+ class_room +"') ?>", "", function(data)
            {
                var schedule = JSON.parse(data);
            });
            calendar(begin, end, blockBegin, blockEnd, schedule);

            $('td').click(function(e){ 
                var id = e.target.id;
                $('#exampleModalLabel').html(id);
            });
        });
    });
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="title page-header">No hay un salon seleccionado</h1>
        </div>
    </div>
    <div id="calendar"></div>

    <div id="modal">
        <div class="col-lg-12">
            <input id="cerrar-modal" name="modal" type="radio" value="cerrar" /> 
            <label for="cerrar-modal" class="cerrar" title="Cerrar"><i class="fa fa-times"></i></label>
                
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

            <label id="label-mostrar-modal" for="mostrar-modal"></label>
            <input id="mostrar-modal" name="modal" type="radio" value="mostrar" />
        </div>

        <div class="col-lg-12">
            <h3 class="page-header">Cambiar dias y horas</h3>
            <div class="form-group">
                <label for="">Dias</label>
                <select id="begin" name="begin" class="form-control">
                    <option value="1">Desde</option>
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
                <select id="end" name="end" class="form-control">
                    <option value="7">Hasta</option>
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
                <select id="blockBegin" name="blockBegin" class="form-control">
                    <option value="1">Desde</option>
                    <?php for ($i=1; $i<=19; $i++ ) : ?>
                        <option value="<?= $i ?>">bloque <?= $i ?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="form-group">
                <select id="blockEnd" name="blockEnd" class="form-control">
                    <option value="19">Hasta</option>
                    <?php for ($i=1; $i<=19; $i++ ) : ?>
                        <option value="<?= $i ?>">bloque <?= $i ?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div>
                <?= form_open("Schedule/index/2") ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <?= form_input(array('type'=>'hidden', 'name'=> 'id', 'value' => '', 'id' => 'id_schedule','placeholder'=>'status')) ?>
                            <?= form_input(array('name'=> 'status', 'value' => '', 'class' => 'form-control','placeholder'=>'status')) ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>