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