<script>
   $(document).ready(function()
    {
        $("#headquarters").change(function(){
            var headquarters = $("#headquarters").val()
            $.get("<?php echo site_url('Room/Building/"+ headquarters +"') ?>", "", function(data)
            {
                var json = JSON.parse(data);
                var html = '<option value="0">Edificio</option>';
                for(post in json)
                {
                    html+=
                    '<option value="'+ json[post].id + '">'+
                    json[post].edificio +
                    '</option>';
                }
                $("#building").html(html);
            });
        });

        $("#building").on("change",function(){
            var building = $("#building").val()
            $('#example').DataTable({
                "destroy": true,
                "ajax": "class_room/"+building,
                "columns": [
                    { "data": "id" },
                    { "data": "salon" },
                    { "data": "tipo" }
                ]
            });
        });
    })
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Salones</h1>
    </div>
</div>

<div class="form-group">
    <select id="headquarters" class="form-control">
        <option value="">Sede</option>
        <?php foreach ($headquarters as $key): ?>
            <option value="<?= $key->id ?>"><?= $key->nombre ?></option>
        <?php endforeach ?>
    </select>
    <select id="building" class="form-control">
        <option value="">Edificio</option>
    </select>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table id="example" class="table table-striped table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>position</th>
                        <th>position</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>position</th>
                        <th>position</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
