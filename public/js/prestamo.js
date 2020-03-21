$(function () {

    btnSave();
    showEdit();
    btnUpdate();
    btnSaveDependencia();
    btnSaveEmpleado();


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

const btnSaveDependencia = () => {
    $('#btnsavedependencia').click(function (e) {
        e.preventDefault();
        saveDependencia();
    });
}

const btnSaveEmpleado = () => {
    $('#btnsaveempleado').click(function (e) {
        e.preventDefault();
        saveEmpleado();
    });
}

const saveDependencia = () => {
    let form = $('#form_create_dependencia');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                success(data.success);
                $('#form_create_dependencia')[0].reset();
                changeSelectDependencia(data.dependencia);
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

const changeSelectDependencia = (dependencia) => {
    $('select[name="dependencia_id"]').append(`<option value="${dependencia.id}">${dependencia.nombre_dependencia}`);
    $('select[name="dependencia_id"]').val(dependencia.id);

    $('select[name="dependencia_id"]').selectpicker("refresh");
    $('select[name="dependencia_id"]').selectpicker("render");

}

const saveEmpleado = () => {
    let form = $('#form_create_empleado');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                success(data.success);
                $('#form_create_empleado')[0].reset();
                changeSelectEmpleado(data.empleado);
                clearSelect('select[name="tipo_id"]');
                clearSelect('select[name="dependencia_id"]');
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

const changeSelectEmpleado = (empleado) => {
    $('select[name="empleado_id"]').append(`<option value="${empleado.id}">${empleado.nombres} ${empleado.apellidos}`);
    $('select[name="empleado_id"]').val(empleado.id);

    $('select[name="empleado_id"]').selectpicker("refresh");
    $('select[name="empleado_id"]').selectpicker("render");

}

const clearSelect = (select) => {
    $(select).val("");
    $(select).selectpicker("refresh");
    $(select).selectpicker("render");
}

const showEdit = () => {
    $('#EditPrestamo').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let fecha = button.data('fecha')
        let motivo = button.data('motivo')
        let funcionario = button.data('funcionario_id')
        let inventario = button.data('invemntario_id')
        let modal = $(this)

        modal.find('.modal-body #id_prestamo').val(id);
        modal.find('.modal-body #fecha').val(fecha);
        modal.find('.modal-body #motivo').val(motivo);
        modal.find('.modal-body #funcionario_id').val(funcionario);
        modal.find('.modal-body #inventario_id').val(inventario);

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
                clearSelect('select[name="empleado_id"]');
                clearSelect('select[name="multimedia_id"]');
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

const findEmpleado = (id) => {

    for (let empleado of empleados) {
        if (empleado.id == id) {
            $('#empleado_name').html(empleado.nombre_completo);
            $('#empleado_tipo').html(empleado.tipo.nombre_tipo);
            $('#empleado_dependencia').html(empleado.dependencia.nombre_dependencia);
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