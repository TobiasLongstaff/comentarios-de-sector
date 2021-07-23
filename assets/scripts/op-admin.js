$(document).ready(() =>
{
    $("#form-agregar-planta").submit(function(e)
    {
        const postData =
        {
            nombre: $('#nombre-planta').val(),
        };
        $.post('partials/agregar-planta.php', postData, function (data)
        {
            if(data == "1")
            {
                obtener_plantas();
            }
            else
            {
                console.log(data);
            }
        }); 
        e.preventDefault();   
    });

    function obtener_plantas()
    {
        $.ajax(
        {
            url: 'partials/obtener-plantas.php',
            type: 'GET',
            success: function (response)
            {
                let plantas = JSON.parse(response);
                let plantilla = '';
                
                plantas.forEach(comentario =>
                {
                    plantilla += 
                    `
                    <tr filaId="${comentario.id}">
                        <td class="td-id">1</td>
                        <td>Prueba 2</td>
                        <td class="container-controles">
                            <button class="btn-editar"><i class="uil uil-edit-alt"></i></button>
                            <button class="btn-eliminar"><i class="uil uil-trash-alt"></i></button>
                        </td>
                    </tr>
                    `                           
                });
                $('#comentarios-del-dia').html(plantilla);
            }
        });
    }
})