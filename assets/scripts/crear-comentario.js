
$(document).ready(() =>
{
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
                console.log(data);
            }
            else
            {
                console.log(data);
            }
        }); 
        e.preventDefault();
    });    

    $("#btn-cancelar-comentario").click(function()
    {
        const form = document.getElementById("form-crear-comentario");
        form.reset();
    });
})