$(function () {

    btnSave();
    showEdit();
    btnUpdate();
    showStatus();
    getMultimediasAvaliables();
    btnExport();
    
});
const btnSave = () => {
    $('#btnsave').click(function (e) {
        e.preventDefault();
        save();
    });
}

const btnUpdate = () => {
    $('#btnupdate').click(function (e) {
        e.preventDefault();
        update();
    });
}

const btnExport = () => {
    $('#btnexport').click(function (e) {
        e.preventDefault();
        expor();
    });
}

const showStatus = () => {
    $('#updatePrestamo').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)      
        let id = button.data('id')      
        let estado = button.data('estado')
        let modal = $(this)
        
        modal.find('.modal-body #id_pres').val(id);
        modal.find('.modal-body #estado').val(estado);
    });
}


const getMultimediasAvaliables = () => {
    let form = $('#form_avaliable');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        success: function (data) {
            if (data.length > 0){
                drawSelect(data);
                enableAlert(false);
            } else {
                enableAlert(true);
            }
        }
    });
}


const enableAlert = (opcion) => {
    if (opcion)
    {
        $('#showMultimediaCreate').hide();
        $('#showAlert').show();
        $('#showMultimediaEdit').hide();
        $('#showAlertEdit').show();
    } else {
        $('#showMultimediaCreate').show();
        $('#showAlert').hide();
        $('#showMultimediaEdit').show();
        $('#showAlertEdit').hide();
    }
}



const drawSelect = (list) => {
    const select = 'select[name=multimedia_id]';
    //const select = '#selectCreate';
    $(select).find('option:not(:first)').remove();
   
    
    for(const multimedia of list) {
        $(select).append(`<option value="${multimedia.id}">${multimedia.nombre_multimedia} (${multimedia.serial})</option>`);
        $(select).val(`${multimedia.id}`);
    }
    
    $(select).val('');
    $(select).selectpicker("refresh");
    $(select).selectpicker("render");


}


// Este es otro metodo por eso el problema
// Este solo te esta limpiando el select
const clearSelects = (select, value = "") => {
    $(select).val(value);
    $(select).selectpicker("refresh");
    $(select).selectpicker("render");
}

const showEdit = () => {
    $('#EditPrestamo').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let usuario = button.data('usuario')
        let multimedia = button.data('multimedia')
        let name = button.data('name_multimedia')
        let serial = button.data('serial')

        let observacion = button.data('observacion')
        let fecha_salida = button.data('fecha_salida')
        let hora_salida = button.data('hora_salida')
        let modal = $(this)
        

        clearSelects('#usuario_id', usuario);
        clearSelects('#multimedia_id', multimedia);
        

        modal.find('.modal-body #id_prestamo').val(id);
        modal.find('.modal-body #name_multimedia').val(`${name} (${serial})`);

        modal.find('.modal-body #observacion').val(observacion);
        modal.find('.modal-body #fecha_salida').val(fecha_salida);
        modal.find('.modal-body #hora_salida').val(hora_salida);

    });
}

const save = () => {
    let form = $('#form_create');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                success(data.success);
                $('#form_create')[0].reset();
                clearSelects('select[name="usuario_id"]');
                clearSelects('select[name="multimedia_id"]');
                $('#crearPrestamo').modal('hide');
                updateTable(); 
                getMultimediasAvaliables();
               
            } else {
                warning(data.warning);
            }
        },
        error: function (data) {
            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });

}

const devolverMultimedia = (context) => {
    let button = context.id;
    let url = $('#' + button).data('href');

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                success(data.success);
                updateTable();
                getMultimediasAvaliables();
            } else {
                warning(data.warning);
            }
        },
    });
}

const findUsuario = (id) => {

    for (let usuario of usuarios) {
        if (usuario.id == id) {
            $('#usuario_name').html(usuario.name);
            $('#usuario_tipo').html(usuario.tipo.nombre_tipo);
            $('#usuario_dependencia').html(usuario.dependencia.nombre_dependencia);
            break;
        }
    }

}

const update = () => {
    let form = $('#form_edit');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function (data) {

            if (data.success) {
                success(data.success);
                $('#EditPrestamo').modal('hide');
                updateTable();
                getMultimediasAvaliables();
            } else {
                warning(data.warning);
            }

        },
        error: function (data) {

            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });
}

const expor = () => {
    let form = $('#form_export');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                success(data.success);
               
            } else {
                warning(data.warning);
            }
        },
        error: function (data) {
            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });

}