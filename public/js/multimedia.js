$(function () {
    btnSave();
    showEdit();
    btnUpdate();
    showStatus();
 
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

const showEdit = () => {
    $('#EditMultimedia').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let nombre = button.data('nombre')
        let marca = button.data('marca')       
        let serial = button.data('serial')
        let modal = $(this)

        modal.find('.modal-body #id_multimedia').val(id);
        modal.find('.modal-body #nombre_multimedia').val(nombre);
        modal.find('.modal-body #marca').val(marca);
        modal.find('.modal-body #serial').val(serial);
    });
}


const showStatus = () => {
    $('#updateMultimedia').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)      
        let id = button.data('id')      
        let estado = button.data('estado')
        let modal = $(this)
        
        modal.find('.modal-body #id_multi').val(id);
        modal.find('.modal-body #estado').val(estado);
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
                clearSelect();
                updateTable();
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

const changeMantenimiento = (context) => {

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
            } else {
                warning(data.warning);
            }
        },
    });
}

const hideButton = (button) => {
    $('#' + button).hide();
}

const changeSelect = (inventario) => {
    $('select[name="inventario_id"]').append(`<option value="${inventario.id}">${inventario.descripcion} - (Cantidad: ${inventario.stock})`);
    $('select[name="inventario_id"]').val(inventario.id);

    $('select[name="inventario_id"]').selectpicker("refresh");
    $('select[name="inventario_id"]').selectpicker("render");

}

const clearSelect = () => {
    $('select[name="inventario_id"]').val("");
    $('select[name="inventario_id"]').selectpicker("refresh");
    $('select[name="inventario_id"]').selectpicker("render");
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
                $('#EditMultimedia').modal('hide');
                updateTable();
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
