<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
    id="modalDetalhesProfissional" tabindex="-1" aria-labelledby="modalDetalhesLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">

            <div class="modal-header bg-light">
                <h1 class="modal-title fs-5 d-flex align-items-center" id="modalDetalhesLabel">
                    <i class="bi bi-person-badge me-2 text-primary"></i> Detalhes do Profissional
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <div class="row align-items-center">

                    <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                        <div class="position-relative d-inline-block">
                            <div class="rounded-circle overflow-hidden border shadow-sm" 
                                 style="width: 180px; height: 180px; background-color: #f8f9fa;">
                                
                                <img id="preVizualizarImagemDetalhes" src=""
                                    class="img-fluid d-none"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                                
                                <div id="textoPreVizualizacaoDetalhes" 
                                     class="d-flex flex-column justify-content-center align-items-center h-100 text-muted">
                                    <i class="bi bi-person-fill fs-1"></i>
                                    <span class="small">Sem Foto</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="row g-3">
                            
                            <div class="col-12 mb-2">
                                <label class="text-uppercase text-muted fw-semibold small d-block">Nome Completo</label>
                                <p class="fs-5 fw-bold text-dark mb-0" id="campo_nome">---</p>
                                <hr class="mt-1 mb-0 opacity-25">
                            </div>


                            <div class="col-12 col-md-6">
                                <label class="text-uppercase text-muted fw-semibold small d-block">
                                    <i class="bi bi-telephone me-1"></i> Telefone
                                </label>
                                <p class="fs-6 fw-medium" id="campo_telefone">---</p>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="text-uppercase text-muted fw-semibold small d-block">
                                    <i class="bi bi-envelope me-1"></i> E-mail
                                </label>
                                <p class="fs-6 fw-medium text-break" id="campo_email">---</p>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="text-uppercase text-muted fw-semibold small d-block">
                                    <i class="bi bi-card-text me-1"></i> CPF
                                </label>
                                <p class="fs-6 fw-medium" id="campo_cpf">---</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary px-4" id="btnIrParaEdicao">
                    <i class="bi bi-pencil-square"></i> Editar
                </button>
            </div>
        </div>
    </div>
</div>