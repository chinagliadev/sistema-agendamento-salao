<div class="modal fade modal-confirmacao" id="modalCancelar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content shadow-strong">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Você realmente deseja cancelar este agendamento? Esta ação não poderá ser desfeita.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn-neutral" data-bs-dismiss="modal">Voltar</button>
                <form id="formCancelarAgendamento" action="../controller/gerenciar_agendamento.php" method="POST">
                    <input type="hidden" name="id_agenda" id="id_para_cancelar">
                    <input type="hidden" name="acaoAgendamento" value="cancelarAgendamento">
                    <button type="submit" class="btn-confirm-cancel">Sim, Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>