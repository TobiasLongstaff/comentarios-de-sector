$(document).ready(() =>
{
    obtener_comentarios();

    function obtener_comentarios()
    {
        $.ajax(
        {
            url: 'partials/obtener-cerrar-comentarios.php',
            type: 'GET',
            success: function (response)
            {
                let comentarios = JSON.parse(response);
                let plantilla = '';
                
                comentarios.forEach(comentario =>
                {
                    plantilla += 
                    `
                    <div class="container-cerrar-comentario" filaId="${comentario.id}" style="--delay: .${comentario.cont}s">
                        <div>
                            <i class="uil uil-clock-three"></i> 
                            <label>${comentario.fecha}</label>
                            <label>${comentario.hora}</label>
                        </div>
                        <h2 class="titulo-comentario">${comentario.motivo}</h2>
                        <div>
                            <label class="text-sector">Sector: ${comentario.sector}</label>
                        </div>
                        <p>${comentario.comentario}</p>
                        <button type="button" class="btn-cerrar-comentario">Cerrar</button>
                    </div>
                    `                           
                });
                $('#cerrar-comentarios').html(plantilla);
            }
        });        
    }

    $(document).on('click','.btn-cerrar-comentario', function(e)
    {
        let element = $(this)[0].parentElement;
        let id = $(element).attr('filaid');
        Swal.fire(
        {
            title: '¿Queres cerrar este comentario?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Cerrar',
            cancelButtonText: 'Cancelar',
        }).then((result) => 
        {
            if (result.isConfirmed) 
            {
                $.post('partials/cerrar-comentario.php', {id}, function()
                {
                    obtener_comentarios();
                });       
            }
        });
    })
});