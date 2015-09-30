$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

var url_actual = $('#current_url').val();
var generar_url = $('#generate_url').val();

$(function(){

    $('#datatable_residencias').DataTable({
        responsive: true
    });

    $('#data_table_personas').dataTable({
        responsive: true
    });

    $('#estado_residencias').change(function(){
        var estado = $(this).val();
        switch(estado){
            case 'todos':
                top.location.href=generar_url + '/residencias';
                break;
            case 'activos':
                top.location.href=url_actual + "?e=activos";
                break;
            case 'inactivos':
                top.location.href=url_actual + "?e=inactivos";
                break;
        }
    });

    $('#btn_aceptar').click(function(){
        // Registrar, actualizar o convertir en dueno.

        $.post($('#form_cambiante_dueno').attr('action'), $('#form_cambiante_dueno').serialize(), function(response){
            console.log(response);
            // Mostrar residencias en caso las tenga.
            /*var id = $('#hd_id').val();
            $('#modal_residencias_personas').modal('show');
            $.get($('#generate_url').val() + '/residencias/obtener-por-dueno/' + id, function(data){
                if(data == 0){
                } else {
                    var html = '';
                    $.each(data, function(i, e){
                        html += '<tr>';
                        html += '<td>' + e.descripcion + '</td>';
                        html += '<td>' + "..." + '</td>';
                        html += '<td>' + e.canthabitaciones + '</td>';
                        html += '<td></td>';
                        html += '</tr>';
                    });
                    $('#tbody_res_d').html(html);
                }
            }, 'json').fail(function(error){
                alert('Error inesperado, intente nuevamente.');
                console.log(error);
            });*/
        }).fail(function(error){
            console.log(error);
        });
    });

    $('#btn_agregar_residencia_d').click(function(){
        if($('#sel_tip_res').val() === 'no_seleccionado'){
            alert('Seleccione un tipo de residencia para continuar.');
        } else if($('#sel_urb_res').val() === 'no_seleccionado'){
            alert('Seleccione una urbanización para continuar.');
        } else {
            var nombre = $('#txt_nom_res').val();
            var urb = $('#sel_urb_res').val();
            var urbSelected = $("#sel_urb_res option:selected").text();
            var cantHab = $('#txt_cathab_res').val();

            var append = '';
            append += '<tr id="res_add_' + nombre + '">';
            append += '<td>' + nombre + '</td>';
            append += '<td>' + urbSelected + '</td>';
            append += '<td>' + cantHab + '</td>';
            append += '<td>';
            append += '<button class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminar_res_add(' + "'" + nombre + "'" + ')"><i class="fa fa-trash-o"></i></button>';
            append += '</td>';
            append += '</tr>';

            $('#form_res_add')[0].reset();
            $('#tbody_res_d').append(append);
            $('#txt_nom_res').focus();
        }
    });

});

function inactivar_residencia(residencia){
    if(confirm('¿Está seguro que desea volver inactiva esta residencia?')){
        $.post($('#generate_url').val() + '/residencias/inactivar-residencia/' + residencia, {'_token': '{!! csrf_token() !!}'}, function(response){
            alert(response);
            $('#tb_res').load(url_actual + ' #tb_res_act');
            setTimeout(function(){
                $('#datatable_residencias').dataTable({
                    responsive: true
                });
            }, 2000);
        }).fail(function(){
            alert('Error inesperado, intente nuevamente.');
        });
    } else {}
}

function editar_residencia(residencia){}

function eliminar_res_add(indicador){
    $('#res_add_' + indicador).remove();
}

function seleccionar_persona(persona, es_dueno){
    $.get($('#generate_url').val() + '/residencias/devolver-persona/' + persona, function(data){
        $('#txt_nombre_persona').val(data.nombres);
        $('#txt_paterno_persona').val(data.paterno);
        $('#txt_materno_persona').val(data.materno);
        if(data.sexo == 1){
            $("#rd_sexo_masculino").attr('checked', 'checked');
        } else if(data.sexo == 2){
            $("#rd_sexo_femenino").attr('checked', 'checked');
        }
        if(data.tipodocumento == 0){
            $('#sel_tipodocumento').val('0');
        } else if(data.tipodocumento == 1){
            $('#sel_tipodocumento').val('1');
        }
        $('#txt_nrodocumento').val(data.nrodocumento);
        $('#txt_fechanacimiento').val(data.fechanacimiento);
        $('#txt_email').val(data.correo);
        $('#txt_cel').val(data.cel);
        $('#hd_id').val(data.id_persona);

        $('#modal_buscar_personas').modal('hide');

        if(es_dueno == 0){
            $('#form_cambiante_dueno').attr('action', generar_url + '/residencias/convertir-en-dueno/' + persona);
        } else {
            $('#form_cambiante_dueno').attr('action', generar_url + '/residencias/actualizar-dueno/' + persona);
        }

    }, 'json').fail(function(){
        alert('Error inesperado, intente nuevamente.');
    });
}

$(function(){

    $('#btn_cancelar_reg_dueno').click(function(){
        $('#form_cambiante_dueno').attr('action', generar_url + '/residencias/registrar-dueno');
    });

});