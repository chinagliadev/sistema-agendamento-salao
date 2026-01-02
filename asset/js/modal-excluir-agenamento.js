const modalCancelar = document.getElementById('modalCancelar');

modalCancelar.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const idAgenda = button.getAttribute('data-id');

    const inputId = modalCancelar.querySelector('#id_para_cancelar');
    inputId.value = idAgenda;
});