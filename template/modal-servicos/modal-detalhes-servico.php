<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
    id="modalDetalhesServico" tabindex="-1" aria-labelledby="modalDetalhesServicoLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">

            <div class="modal-header bg-light">
                <h1 class="modal-title fs-5 d-flex align-items-center" id="modalDetalhesServicoLabel">
                    <i class="bi bi-briefcase me-2 text-primary"></i> Detalhes do Serviço
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <div class="row">

                    <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                        <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                                <img id="preVizualizarImagemServicoDetalhes" src=""
                                    class="img-fluid d-none"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                                
                                <div id="textoPreVizualizacaoServico" class="text-center text-muted p-3">
                                    <i class="bi bi-image fs-1 d-block mb-2"></i>
                                    <span class="small fw-bold text-uppercase">Foto do Serviço</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="row g-3">
                            
                            <div class="col-12 mb-2">
                                <label class="text-uppercase text-muted fw-semibold small d-block">Nome do Serviço</label>
                                <p class="fs-4 fw-bold text-dark mb-0" id="campo_nome_servico_detalhes">---</p>
                                <hr class="mt-1 mb-0 opacity-25">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="text-uppercase text-muted fw-semibold small d-block">
                                    <i class="bi bi-cash-stack me-1 text-success"></i> Preço
                                </label>
                                <p class="fs-5 fw-bold text-success" id="campo_preco_servico_detalhes">R$ 0,00</p>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="text-uppercase text-muted fw-semibold small d-block">
                                    <i class="bi bi-clock me-1"></i> Duração Estimada
                                </label>
                                <p class="fs-5 fw-medium" id="campo_duracao_servico_detalhes">---</p>
                            </div>

                            <div class="col-12">
                                <div class="p-3 bg-light rounded-3 border-start border-4 border-primary">
                                    <label class="text-uppercase text-muted fw-semibold small d-block mb-1">Descrição</label>
                                    <p class="text-secondary mb-0" id="campo_descricao_servico_detalhes" style="text-align: justify;">
                                        Nenhuma descrição informada para este serviço.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>