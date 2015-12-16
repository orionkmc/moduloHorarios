function modal_left()
{
    $("#mostrar-modal").on("click", function(){
        if($("#mostrar-modal").attr('value') == 'mostrar')
        {
            $("#modal").css('left', '0');
            $("#box_schedule").css('width', '80%');
            $("#box_schedule").css('transition', 'all 1s');
            $("#label-mostrar-modal").css('transition', 'all 1s');
            $("#label-mostrar-modal").css('margin-left', '20%');

        }
    });
    $("#cerrar-modal").on("click", function(){
        if($("#cerrar-modal").attr('value') == 'cerrar')
        {
            $("#modal").css('left', '-20%');
            $("#box_schedule").css('width', '100%');
            $("#box_schedule").css('transition', 'all 1s');
            $("#label-mostrar-modal").css('transition', 'all 1s');
            $("#label-mostrar-modal").css('margin-left', '0%');
        }
    });
}