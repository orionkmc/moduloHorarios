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
        '</tr>';
        '<tr class="active">';
    for (var j = begin; j < end; j++) 
    {
        if (j==0) { calendar +='<th>HOR<span>A</span></th>'; };
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
    for (var i = blockBegin; i < blockEnd; i++) 
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
        for (var j = begin; j < end - 1; j++) 
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