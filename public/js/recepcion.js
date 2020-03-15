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
    $('#EditRecepcion').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let fechaentrada = button.data('fecha_entrada')
        let fechasalida = button.data('fecha_salida')
        let motivo = button.data('motivo')  
        let equipo = button.data('equipo_id')      
        let modal = $(this)

        modal.find('.modal-body #id_recepcion').val(id);
        modal.find('.modal-body #fecha_entrada').val(fechaentrada);
        modal.find('.modal-body #fechad_salida').val(fechasalida);
        modal.find('.modal-body #motivo').val(motivo);
        modal.find('.modal-body #equipo_id').val(equipo);

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
                $('#EditRecepcion').modal('hide');
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