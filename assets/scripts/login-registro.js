$(document).ready(() =>
{
    $("#form-login").submit(function(e)
    {
        const postData =
        {
            mail: $('#log-mail').val(),
            password: $('#log-pass').val()
        };
        $.post('partials/logeo.php', postData, function (data)
        {
            if(data == "1")
            {
                $(location).attr('href','index.php');
            }
            else
            {
                console.log(data);
            }
        }); 
        e.preventDefault();   
    });

    $('#form-registrarse').submit(function (e)
    {
        const postData = 
        {
            mail: $('#regis-mail').val(),
            nombre_apellido: $('#regis-user').val(),
            password: $('#regis-pass').val(),
            password_con: $('#regis-pass-veri').val(),
            planta: $('#regis-planta').val(),
            sector: $('#regis-sector').val()
        };
        $.post('partials/crear-cuenta.php', postData, function (data)
        {    
            console.log(data)      
            let plantilla = '';
            if(data == '1')
            {
                Swal.fire(
                    '¡Usuario registrado correctamente!',
                    'Recibirás un mail con la información de tu cuenta.',
                    'success'
                )
                const form = document.getElementById("form-registrarse");
                form.reset();
            }
            else
            {
                plantilla +=
                `
                    <span><i class="fas fa-exclamation-triangle"></i> ${data}</span>
                `            
            }
            // $('#alerta-registro').html(plantilla);       

        });
        e.preventDefault();
    });
})