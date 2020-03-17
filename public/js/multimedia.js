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
    $('#EditMultimedia').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let nombre = button.data('nombre_multimedia')
        let tipo = button.data('tipo')
        let serial = button.data('serial')
        let estado = button.data('estado')
        let modal = $(this)

        modal.find('.modal-body #id_dependencia').val(id);
        modal.find('.modal-body #nombre_multimedia').val(nombre);
        modal.find('.modal-body #tipo').val(tipo);
        modal.find('.modal-body #serial').val(serial);
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