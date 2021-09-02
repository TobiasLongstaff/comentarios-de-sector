
$(document).ready(() =>
{
    obtener_prevision_de_hacienda();

    $('#ver-prevision').click(function(e)
    {
        $(this).addClass('prevision-select');
        $('#agregar-prevision').removeClass('prevision-select');
        $('#agregar-prevision-de-hacienda').css('display', 'none');
        $('#prevision-de-hacienda').css('display', 'block');
        e.preventDefault();
    })

    $('#agregar-prevision').click(function(e)
    {
        $(this).addClass('prevision-select');
        $('#ver-prevision').removeClass('prevision-select');
        $('#prevision-de-hacienda').css('display', 'none');
        $('#agregar-prevision-de-hacienda').css('display', 'block');
        e.preventDefault();
    })

    $('#form-crear-prevision-de-hacienda').submit(function(e)
    {
        const postData =
        {
            fecha: $('#pre-fecha').val(),
            apellido: $('#pre-apellido').val(),
            cantidad: $('#pre-cantidad').val(),
            comisionista: $('#pre-comisionista').val(),
            compra_local: $('#pre-compra-local').val()
        };
        $.post('partials/crear-prevision.php', postData, function (data)
        {
            if(data == "1")
            {
                $('#text-alerta').html('¡Prevision agregada exitosamente!');
                $('.container-alerta').css(
                {
                    'background': 'var(--verde)'
                });
                $('.container-alerta').addClass("active");
                obtener_prevision_de_hacienda();
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

    $(document).on('click', '.btn-eliminar-previcion', function(e)
    {
        let element = $(this)[0].parentElement;
        let id = $(element).attr('filaid');

        Swal.fire(
        {
            title: '¿Queres eliminar esta prevision?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => 
        {
            if (result.isConfirmed) 
            {
                $.post('partials/eliminar-prevision.php', {id}, function()
                {
                    obtener_prevision_de_hacienda();
                });       
            }
        });
        e.preventDefault();
    })

    function ocultar_alerta()
    {
        $('.container-alerta').removeClass("active");
    }

    function obtener_prevision_de_hacienda()
    {
        $.ajax(
        {
            url: 'partials/obtener-prevision-de-hacienda.php',
            type: 'GET',
            success: function (response)
            {
                let plantilla = '';
                if(response == '[]')
                {
                    plantilla += 
                    `<div class="container-mensaje-comentario" style="--delay: .1s">
                        <i class="uil uil-comment-alt-question"></i>
                        <h3>No se encontro prevision de hacienda</h3>
                    </div>`
                    $('#prevision-de-hacienda').html(plantilla);
                }
                else
                {
                    let comentarios = JSON.parse(response);
                    comentarios.forEach(comentario =>
                        {
                            plantilla += 
                            `
                            <div class="container-comentario" filaId="${comentario.id}" style="--delay: .${comentario.cont}s">
                                <div>
                                    <i class="uil uil-clock-three"></i> 
                                    <label>${comentario.fecha}</label>
                                </div>
                                <h2 class="titulo-comentario">${comentario.apellido}</h2>
                                <div>
                                    <label class="text-sector">Cantidad: ${comentario.kg}</label>
                                </div>
                                <p>Comisionista: ${comentario.comisionista}</p>
                                <p>Compra local: ${comentario.compra_local}</p>
                                <button class="btn-eliminar-previcion">Eliminar</button>
                            </div>
                            `                           
                        });
                        $('#prevision-de-hacienda').html(plantilla);
                }
            }
        });
    }
});