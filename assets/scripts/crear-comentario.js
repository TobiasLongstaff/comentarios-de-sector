
$(document).ready(() =>
{
    obtener_sector();
    obtener_motivo()

    $("#form-crear-comentario").submit(function(e) 
    {
        const postData =
        {
            fecha: $('#com-fecha').val(),
            hora: $('#com-hora').val(),
            sector: $('#com-sector').val(),
            motivo: $('#com-motivo').val(),
            comentario: $('#com-comentario').val(),
        };
        $.post('partials/crear-comentario.php', postData, function (data)
        {
            if(data == "1")
            {
                $('#text-alerta').html('¡Comentario agregado exitosamente!');
                $('.container-alerta').css(
                {
                    'background': 'var(--verde)'
                });
                $('.container-alerta').addClass("active");

                setTimeout(ocultar_alerta,5000);   
            }
            else
            {
                console.log(data);
                $('#text-alerta').html(data);
                $('.container-alerta').css(
                {
                    'background': 'var(--rojo)'
                });
                $('.container-alerta').addClass("active");

                setTimeout(ocultar_alerta,5000);    
            }
        }); 
        e.preventDefault();
    });    

    $("#btn-cancelar-comentario").click(function()
    {
        const form = document.getElementById("form-crear-comentario");
        form.reset();
    });

    function ocultar_alerta()
    {
        $('.container-alerta').removeClass("active");
    }

    function obtener_sector()
    {
        $.ajax(
        {
            url: 'partials/obtener-sectores.php',
            type: 'GET',
            success: function (response)
            {
                let plantilla = '';
                let sectores = JSON.parse(response);
                sectores.forEach(sector =>
                {
                    plantilla += 
                    `
                        <option value="${sector.nombre}">${sector.nombre}</option>
                    `                           
                });
                $('#com-sector').html(plantilla);
            }
        });
    }

    function obtener_motivo()
    {
        $.ajax(
        {
            url: 'partials/obtener-motivo.php',
            type: 'GET',
            success: function (response)
            {
                let plantilla = '';
                let motivos = JSON.parse(response);
                motivos.forEach(motivo =>
                {
                    plantilla += 
                    `
                        <option value="${motivo.nombre}">${motivo.nombre}</option>
                    `                           
                });
                $('#com-motivo').html(plantilla);
            }
        });
    }
})