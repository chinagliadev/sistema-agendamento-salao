<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
    id="modalDetalhesServico" tabindex="-1" aria-labelledby="modalDetalhesServicoLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDetalhesServicoLabel">
                    <i class="bi bi-briefcase"></i> Detalhes do Serviço
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">

                    <div class="col-12 col-md-4">
                        <div class="conteudo-img mb-3 w-100" id="colunaFotoServicoDetalhes">
                            <div class="card" style="width: 220px; height: 220px;">
                                <img id="preVizualizarImagemServicoDetalhes" src=""
                                    class="img-fluid d-none"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                                <div class="card-body bg-light p-0 d-flex justify-content-center align-items-center"
                                    style="height: 200px; width: 200px; overflow: hidden;">

                                    <h2 id="textoPreVizualizacaoServico"
                                        class="text-center text-muted fs-5">Foto do Serviço</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">

                        <div class="mb-3">
                            <span class="descricao_campo fs-6 text-muted">Nome do Serviço</span>
                            <p class="valor_campo fs-5 fw-bold" id="campo_nome_servico_detalhes"></p>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-md-6 mb-3">
                                <span class="descricao_campo fs-6 text-muted">Preço</span>
                                <p class="valor_campo fs-5 fw-bold" id="campo_preco_servico_detalhes"></p>
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <span class="descricao_campo fs-6 text-muted">Duração</span>
                                <p class="valor_campo fs-5 fw-bold" id="campo_duracao_servico_detalhes"></p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="descricao_campo fs-6 text-muted">Descrição</span>
                            <p class="valor_campo fs-5 fw-bold" id="campo_descricao_servico_detalhes"></p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>
