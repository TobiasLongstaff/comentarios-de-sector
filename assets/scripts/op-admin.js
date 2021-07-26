$(document).ready(() =>
{
    let edit_planta = false;
    let edit_sector = false;
    let edit_motivo = false;

    obtener_plantas();
    obtener_sectores();
    obtener_motivo();

    $("#form-agregar-planta").submit(function(e)
    {
        const postData =
        {
            nombre: $('#nombre-planta').val(),
            id: $('#id-planta').val()
        };

        let url = edit_planta === false ? 'partials/agregar-planta.php' : 'partials/editar-planta.php';

        $.post(url, postData, function (data)
        {
            if(data == "1")
            {
                Swal.fire(
                    '¡Operación realizada exitosamente!',
                    '',
                    'success'
                )
                const form = document.getElementById("form-agregar-planta");
                form.reset();
                edit_planta = false;
                $('#btn-agregar-nueva-planta').val('Agregar');
                $('#btn-agregar-nueva-planta').css('background-color', 'var(--azul)')
                obtener_plantas();
            }
            else
            {
                console.log(data);
            }
        }); 
        e.preventDefault();   
    });

    $("#form-agregar-sector").submit(function(e)
    {
        const postData =
        {
            nombre: $('#nombre-sector').val(),
            id: $('#id-sector').val()
        };

        let url = edit_planta === false ? 'partials/agregar-sector.php' : 'partials/editar-sector.php';

        $.post(url, postData, function (data)
        {
            if(data == "1")
            {
                Swal.fire(
                    '¡Operación realizada exitosamente!',
                    '',
                    'success'
                )
                const form = document.getElementById("form-agregar-sector");
                form.reset();
                edit_sector = false;
                $('#btn-agregar-nuevo-sector').val('Agregar');
                $('#btn-agregar-nuevo-sector').css('background-color', 'var(--azul)')
                obtener_sectores()
            }
            else
            {
                console.log(data);
            }
        }); 
        e.preventDefault();   
    });
    
    $("#form-agregar-motivo").submit(function(e)
    {
        const postData =
        {
            nombre: $('#nombre-motivo').val(),
            id: $('#id-motivo').val()
        };

        let url = edit_motivo === false ? 'partials/agregar-motivo.php' : 'partials/editar-motivo.php';

        $.post(url, postData, function (data)
        {
            if(data == "1")
            {
                Swal.fire(
                    '¡Operación realizada exitosamente!',
                    '',
                    'success'
                )
                const form = document.getElementById("form-agregar-motivo");
                form.reset();
                edit_motivo = false;
                $('#btn-agregar-nuevo-motivo').val('Agregar');
                $('#btn-agregar-nuevo-motivo').css('background-color', 'var(--azul)')
                obtener_motivo();
            }
            else
            {
                console.log(data);
            }
        }); 
        e.preventDefault();   
    });

    $(document).on('click', '.eliminar-planta', function(e)
    {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('filaid');

        Swal.fire(
        {
            title: '¿Queres eliminar esta planta?',
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
                $.post('partials/eliminar-planta.php', {id}, function()
                {
                    Swal.fire(
                        '¡Planta eliminarda exitosamente!',
                        '',
                        'success'
                    )
                    obtener_plantas();
                });       
            }
        });
        e.preventDefault();
    })

    $(document).on('click', '.eliminar-sector', function(e)
    {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('filaid');

        Swal.fire(
        {
            title: '¿Queres eliminar este sector?',
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
                $.post('partials/eliminar-sector.php', {id}, function()
                {
                    Swal.fire(
                        '¡Sector eliminardo exitosamente!',
                        '',
                        'success'
                    )
                    obtener_sectores();
                });       
            }
        });
        e.preventDefault();
    })

    $(document).on('click', '.eliminar-motivo', function(e)
    {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('filaid');

        Swal.fire(
        {
            title: '¿Queres eliminar este motivo?',
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
                $.post('partials/eliminar-motivo.php', {id}, function()
                {
                    Swal.fire(
                        '¡Motivo eliminardo exitosamente!',
                        '',
                        'success'
                    )
                    obtener_motivo();
                });       
            }
        });
        e.preventDefault();
    })

    $(document).on('click', '.editar-planta', function(e)
    {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('filaid');

        $.post('partials/obtener-datos-planta-editar.php', {id}, function(data)
        {
            const planta = JSON.parse(data);
            $('#nombre-planta').val(planta.nombre);
        })

        $('#btn-agregar-nueva-planta').val('Editar');
        $('#btn-agregar-nueva-planta').css('background-color', '#15a95b')
        edit_planta = true;
        $('#id-planta').val(id);
        e.preventDefault();
    })

    $(document).on('click', '.editar-sector', function(e)
    {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('filaid');

        $.post('partials/obtener-datos-sector-editar.php', {id}, function(data)
        {
            const sector = JSON.parse(data);
            $('#nombre-sector').val(sector.nombre);
        })

        $('#btn-agregar-nuevo-sector').val('Editar');
        $('#btn-agregar-nuevo-sector').css('background-color', '#15a95b')
        edit_planta = true;
        $('#id-sector').val(id);
        e.preventDefault();
    })

    $(document).on('click', '.editar-motivo', function(e)
    {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('filaid');

        $.post('partials/obtener-datos-motivo-editar.php', {id}, function(data)
        {
            const motivo = JSON.parse(data);
            $('#nombre-motivo').val(motivo.nombre);
        })

        $('#btn-agregar-nuevo-motivo').val('Editar');
        $('#btn-agregar-nuevo-motivo').css('background-color', '#15a95b')
        edit_motivo = true;
        $('#id-motivo').val(id);
        e.preventDefault();
    })

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
                
                plantas.forEach(planta =>
                {
                    plantilla += 
                    `
                    <tr filaId="${planta.id}">
                        <td class="td-id">${planta.id}</td>
                        <td>${planta.nombre}</td>
                        <td class="container-controles">
                            <button class="btn-editar editar-planta"><i class="uil uil-edit-alt"></i></button>
                            <button class="btn-eliminar eliminar-planta"><i class="uil uil-trash-alt"></i></button>
                        </td>
                    </tr>
                    `                           
                });
                $('#container-plantas').html(plantilla);
            }
        });
    }

    function obtener_sectores()
    {
        $.ajax(
        {
            url: 'partials/obtener-sectores.php',
            type: 'GET',
            success: function (response)
            {
                let sectores = JSON.parse(response);
                let plantilla = '';
                
                sectores.forEach(sector =>
                {
                    plantilla += 
                    `
                    <tr filaId="${sector.id}">
                        <td class="td-id">${sector.id}</td>
                        <td>${sector.nombre}</td>
                        <td class="container-controles">
                            <button class="btn-editar editar-sector"><i class="uil uil-edit-alt"></i></button>
                            <button class="btn-eliminar eliminar-sector"><i class="uil uil-trash-alt"></i></button>
                        </td>
                    </tr>
                    `                           
                });
                $('#container-sectores').html(plantilla);
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
                let motivos = JSON.parse(response);
                let plantilla = '';
                
                motivos.forEach(motivo =>
                {
                    plantilla += 
                    `
                    <tr filaId="${motivo.id}">
                        <td class="td-id">${motivo.id}</td>
                        <td>${motivo.nombre}</td>
                        <td class="container-controles">
                            <button class="btn-editar editar-motivo"><i class="uil uil-edit-alt"></i></button>
                            <button class="btn-eliminar eliminar-motivo"><i class="uil uil-trash-alt"></i></button>
                        </td>
                    </tr>
                    `                           
                });
                $('#container-motivos').html(plantilla);
            }
        });
    }
})