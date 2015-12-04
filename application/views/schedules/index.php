<script>
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
    for (var i = blockBegin; i <= blockEnd; i++)
    {
        if (i==7)
        {
            calendar +='<tr>'+
                '<th class="medio active" colspan="8">TARDE</th>'+
            '</tr>';
        };
        if (i==12)
        {
            calendar +='<tr>'+
            '<th class="medio active" colspan="8">NOCHE</th>'+
        '</tr>';
        };
        calendar +=
            '<tr>'+
            '<td class="hora">7:00 a 7:45</td>';
        for (var j = begin; j <= end; j++) 
        {
            calendar +='<td>'+ c +'</td>';
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
                <option value="1">bloque 1</option>
                <option value="2">bloque 2</option>
                <option value="3">bloque 3</option>
                <option value="4">bloque 4</option>
                <option value="5">bloque 5</option>
                <option value="6">bloque 6</option>
                <option value="7">bloque 7</option>
                <option value="8">bloque 8</option>
                <option value="9">bloque 9</option>
                <option value="10">bloque 10</option>
                <option value="11">bloque 11</option>
                <option value="12">bloque 12</option>
                <option value="13">bloque 13</option>
                <option value="14">bloque 14</option>
                <option value="15">bloque 15</option>
                <option value="16">bloque 16</option>
                <option value="17">bloque 17</option>
                <option value="18">bloque 18</option>
                <option value="19">bloque 19</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Desde</label>
            <select name="blockEnd" class="form-control">
                <option value="0"></option>
                <option value="1">bloque 1</option>
                <option value="2">bloque 2</option>
                <option value="3">bloque 3</option>
                <option value="4">bloque 4</option>
                <option value="5">bloque 5</option>
                <option value="6">bloque 6</option>
                <option value="7">bloque 7</option>
                <option value="8">bloque 8</option>
                <option value="9">bloque 9</option>
                <option value="10">bloque 10</option>
                <option value="11">bloque 11</option>
                <option value="12">bloque 12</option>
                <option value="13">bloque 13</option>
                <option value="14">bloque 14</option>
                <option value="15">bloque 15</option>
                <option value="16">bloque 16</option>
                <option value="17">bloque 17</option>
                <option value="18">bloque 18</option>
                <option value="19">bloque 19</option>
            </select>
        </div>
        <style>
        .kuai{
            margin: auto;
        }
        </style>
        <input class="btn btn-primary kuai" type="submit" value="enviar">
    </form>
</div>