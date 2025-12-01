<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalAtivarServico" tabindex="-1" aria-labelledby="modalDesativarLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">

        <form action="../controller/gerenciar_servicos.php" method="POST">
            <div class="modal-content">

                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="modalAtivarLabel"><i class="bi bi-person-check-fill"></i> Confirmação de Ativação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center p-4">
                    <input type="hidden" id="inputIdServicoAtivar" name="inputIdServicoAtivar">
                    <input type="hidden" id="acaoServicoAtivar" name="acaoServico">

                    <p id="id_hidden"></p>
                    <div class="mb-4 mx-auto p-3 bg-success-subtle rounded-circle" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-check-circle text-success fs-1"></i>
                    </div>

                    <div class="texto-aviso">
                        <p class="fs-5 fw-bold text-dark mb-1">
                            Deseja realmente ativar o Serviço
                        </p>
                        <p class="text-muted mt-3 mb-0 fs-6">
                            Ao Ativar, o acesso dele ao sistema será ativado e ele aparecerá nas listagens de ativos.
                        </p>
                    </div>
                </div>

                <div class="modal-footer justify-content-center border-0 pt-0 pb-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Sim, Ativar serviço</button>
                </div>

            </div>
        </form>
    </div>
</div>