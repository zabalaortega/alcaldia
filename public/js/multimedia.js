$(function () {
    btnSave();
    showEdit();
    btnUpdate();
    btnSaveInventario();
    btnUpdateStock();
});

const btnSave = () => {
    $('#btnsave').click(function (e) {
        e.preventDefault();
        save();
    });
}

const btnSaveInventario = () => {
    $('#btnsaveinventory').click(function (e) {
        e.preventDefault();
        saveInventario();
    });
}

const btnUpdate = () => {
    $('#btnupdate').click(function (e) {
        e.preventDefault();
        update();
    });
}

const btnUpdateStock = () => {
    $('#btnsavestock').click(function (e) {
        e.preventDefault();
        saveStock();
    });
}

const showEdit = () => {
    $('#EditMultimedia').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let nombre = button.data('nombre')
        let tipo = button.data('tipo')
        let serial = button.data('serial')
        let modal = $(this)

        modal.find('.modal-body #id_multimedia').val(id);
        modal.find('.modal-body #nombre_multimedia').val(nombre);
        modal.find('.modal-body #tipo').val(tipo);
        modal.find('.modal-body #serial').val(serial);
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

const changeStatus = (context) => {

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

const saveInventario = () => {
    let form = $('#form_create_inventory');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                success(data.success);
                $('#form_create_inventory')[0].reset();
                changeSelect(data.inventario);
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

const saveStock = () => {
    let form = $('#form_add_stock');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                success(data.success);
                $('#form_add_stock')[0].reset();
                clearSelect();
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