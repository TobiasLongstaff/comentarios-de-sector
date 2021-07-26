
$(document).ready(() =>
{
    $.ajax(
    {
        url: 'partials/obtener-comentarios-del-dia.php',
        type: 'GET',
        success: function (response)
        {
            let plantilla = '';
            if(response == '[]')
            {
                plantilla += 
                `<div class="container-mensaje-comentario" style="--delay: .1s">
                    <i class="uil uil-comment-alt-question"></i>
                    <h3>No se encontraron comentarios</h3>
                    <label>No tienes comentarios programados para el día de hoy</label>
                </div>`
                $('#comentarios-del-dia').html(plantilla);
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
                                <label>${comentario.hora}</label>
                            </div>
                            <h2 class="titulo-comentario">${comentario.motivo}</h2>
                            <div>
                                <label class="text-sector">Sector: ${comentario.sector}</label>
                            </div>
                            <p>${comentario.comentario}</p>
                        </div>
                        `                           
                    });
                    $('#comentarios-del-dia').html(plantilla);
            }
        }
    });
});
