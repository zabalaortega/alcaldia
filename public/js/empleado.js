$(function () {

    btnSave();
    showEdit();
    btnUpdate();

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
    $('#EditEmpleado').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let nombre = button.data('nombre')
        let apellido = button.data('apellido')
        let tipo = button.data('tipo')
        let dependencia = button.data('dependencia')
        let modal = $(this)

        clearSelects('#tipo_id', tipo);
        clearSelects('#dependencia_id', dependencia);

        modal.find('.modal-body #id_empleado').val(id);
        modal.find('.modal-body #nombres').val(nombre);
        modal.find('.modal-body #apellidos').val(apellido);
       
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
                clearSelects('select[name="tipo_id"]');
                clearSelects('select[name="dependencia_id"]');
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

const clearSelects = (select, value = "") => {
    $(select).val(value);
    $(select).selectpicker("refresh");
    $(select).selectpicker("render");

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
                $('#EditEmpleado').modal('hide');
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