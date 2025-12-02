<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
    id="modalDetalhesProfissional" tabindex="-1" aria-labelledby="modalDetalhesLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDetalhesLabel">
                    <i class="bi bi-eye"></i> Detalhes Profissional
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form id="formEditarProfissional" action="../controller/gerenciar_profissionais.php"
                    method="POST" enctype="multipart/form-data">

                    <input type="hidden" id="id_profissional" name="id_profissional">
                    <input type="hidden" id="acaoProfissional" name="acaoProfissional" value="editar_profissional">

                    <div class="row mb-2">

                        <div class="col-12 col-md-4">
                            <div class="conteudo-img mb-3 w-100" id="colunaFotoEditar">
                                <div class="card" style="width: 220px; height: 220px;">
                                    <img id="preVizualizarImagemDetalhes" src=""
                                        class="img-fluid d-none"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                    <div class="card-body bg-light p-0 d-flex justify-content-center align-items-center"
                                        style="height: 200px; width: 200px; overflow: hidden;">

                                        <h2 id="textoPreVizualizacaoDetalhes"
                                            class="text-center text-muted fs-5">Foto do Profissional</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <span class="descricao_campo fs-6 text-muted">Nome</span>
                                <p class="valor_campo fs-5 fw-bold" id="campo_nome"></p>
                            </div>

                            <div class="row mb-3">

                                <div class="col-12 col-md-6 mb-3">
                                    <span class="descricao_campo fs-6 text-muted">Especialidade</span>
                                    <p class="valor_campo fs-5 fw-bold" id="campo_especialidade"></p>
                                </div>

                                <div class="col-12 col-md-6 mb-3">
                                    <span class="descricao_campo fs-6 text-muted">Telefone</span>
                                    <p class="valor_campo fs-5 fw-bold" id="campo_telefone"></p>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-12 col-md-6 mb-3">
                                    <span class="descricao_campo fs-6 text-muted">Email</span>
                                    <p class="valor_campo fs-5 fw-bold" id="campo_email"></p>
                                </div>

                                <div class="col-12 col-md-6 mb-3">
                                    <span class="descricao_campo fs-6 text-muted">CPF</span>
                                    <p class="valor_campo fs-5 fw-bold" id="campo_cpf"></p>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btnFecharModalEditar"
                            data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>