<script>
    function sumaHoras(inicial, suma) 
    {
        inicial = inicial.split(":");
        var hora = inicial[0], minutos = inicial[1];
        minutos = parseInt(minutos) + suma;
        if(minutos >= 60) 
        {
            hora = parseInt(hora) + parseInt(minutos / 60);
            minutos = minutos - parseInt(minutos / 60) * 60;
        }
        return (hora > 12 ? hora - 12 : hora) + ":" + (minutos < 10 ? "0" + minutos : minutos);
    }

    $(document).ready(function()
    {
    var c = 1;
    var begin = <?= $begin ?>;
    var end = <?= $end ?>;
    var blockBegin = <?= $blockBegin ?>;
    var blockEnd = <?= $blockEnd ?>;

    var calendar = 
        '<table class="table table-bordered">'+
        '<thead>'+
        '<tr>'+
            '<th class="medio active" colspan="8">MAÑANA</th>'+
        '</tr>'+
        '<tr class="active">'+
            '<th>HOR<span>A</span></th>';
    for (var j = begin; j <= end; j++) 
    {
        if (j==1) { calendar +='<th>Lun<span>es</span></th>'; };
        if (j==2) { calendar +='<th>Mar<span>tes</span></th>'; };
        if (j==3) { calendar +='<th>Mi&eacute;<span>rcoles</span></th>'; };
        if (j==4) { calendar +='<th>Jue<span>ves</span></th>'; };
        if (j==5) { calendar +='<th>Vie<span>rnes</span></th>'; };
        if (j==6) { calendar +='<th>S&aacute;b<span>ado</span></th>'; };
        if (j==7) { calendar +='<th>Dom<span>ingo</span></th>'; };
    }
    calendar +=
        '</tr>'+
        '</thead>'+
        '<tbody>';
        var hora = '7:00'
    for (var i = blockBegin; i <= blockEnd; i++)
    {
        if (i==9)
        {
            calendar +='<tr>'+
                '<th class="medio active" colspan="8">TARDE</th>'+
            '</tr>';
        };

        if (i==15)
        {
            calendar +='<tr>'+
                '<th class="medio active" colspan="8">NOCHE</th>'+
            '</tr>';
        };

        calendar +=
            '<tr>'+
            '<td class="hora"> '+ hora +' a '+ sumaHoras(hora, 45*1) +'</td>';

            (i==1) ? hora = '7:45' : '';
            (i==2) ? hora = '08:40' : '';
            (i==3) ? hora = '09:25' : '';
            (i==4) ? hora = '10:20' : '';
            (i==5) ? hora = '11:05' : '';
            (i==6) ? hora = '11:50' : '';
            (i==7) ? hora = '12:45' : '';
            (i==8) ? hora = '01:30' : '';
            (i==9) ? hora = '02:25' : '';
            (i==10) ? hora = '03:10' : '';
            (i==11) ? hora = '04:05' : '';
            (i==12) ? hora = '04:50' : '';
            (i==13) ? hora = '05:45' : '';
            (i==14) ? hora = '06:30' : '';
            (i==15) ? hora = '07:15' : '';
            (i==16) ? hora = '08:00' : '';
            (i==17) ? hora = '08:45' : '';
            (i==18) ? hora = '09:30' : '';

            /*(i<18) ? ((i%2)== 1) ? hora = sumaHoras(hora, 45*1) : hora = sumaHoras(hora, 55*1) : hora = sumaHoras(hora, 45*1);*/

        for (var j = begin; j <= end; j++) 
        {
            calendar +='<td>'+ i +'</td>';
            c++
        }
        calendar +='</tr>';
    };
    calendar +='</tbody>'+
    '</table>';
    $("#calendar").html(calendar);
});
</script>
<div class="row">
<div id="calendar"></div>
<input id="mostrar-modal" name="modal" type="radio"/> 
<label for="mostrar-modal" class="btn btn-primary"> Configurar Horario </label>

<div id="modal">
    <input id="cerrar-modal" name="modal" type="radio" /> 
    <label for="cerrar-modal"> X </label> 
    <form action="<?= site_url('Schedule/index/2') ?>" method="post">
        <div class="form-group">
            <label for="">Desde</label>
            <select name="begin" class="form-control">
                <option value="0"></option>
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
            <label for="">Hasta</label>
            <select name="end" class="form-control">
                <option value="0"></option>
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
            <label for="">Desde</label>
            <select name="blockBegin" class="form-control">
                <option value="0"></option>
                <?php for ($i=1; $i<=19; $i++ ) : ?>
                    <option value="<?= $i ?>">bloque <?= $i ?></option>
                <?php endfor ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Desde</label>
            <select name="blockEnd" class="form-control">
                <option value="0"></option>
                <?php for ($i=1; $i<=19; $i++ ) : ?>
                    <option value="<?= $i ?>">bloque <?= $i ?></option>
                <?php endfor ?>
            </select>
        </div>
        
        <input class="btn btn-primary" type="submit" value="enviar">
    </form>
</div>