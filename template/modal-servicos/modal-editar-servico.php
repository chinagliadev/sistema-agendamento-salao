<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalEditarServico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-briefcase"></i> Editar Serviço</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="formEditarServico" action="../controller/gerenciar_servicos.php" method="POST" enctype="multipart/form-data">

                    <div class="row mb-2">

                        <div class="col-12 col-md-4">
                            <div class="conteudo-img mb-3 w-100" id="colunaFoto">
                                <div class="card" style="width: 220px; height: 220px;">
                                    <div class="card-body bg-light p-0 d-flex justify-content-center align-items-center">
                                        <img id="preVizualizarImagemEditar" src="" class="img-fluid d-none" style="width: 100%; height: 100%; object-fit: cover;">
                                        <h2 id="textoPreVizualizacaoEditar" class="text-center text-muted fs-5">Foto do Serviço</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="arquivoFotoServicoEditar" class="form-label">Foto do Serviço</label>
                                <input type="file" accept="image/*" class="form-control"
                                       id="arquivoFotoServicoEditar" name="arquivoFotoServicoEditar">
                            </div>

                            <input type="hidden" id="inputIdEditarServico" name="inputIdServico">
                            <input type="hidden" id="acaoServicoEditar" name="acaoServico">

                            <div class="mb-3">
                                <label for="txtNomeServicoEditar" class="form-label">Nome do Serviço</label>
                                <input type="text" class="form-control"
                                       id="txtNomeServicoEditar" name="txtNomeServicoEditar">
                                <span class="mensagem-erro d-none text-danger"></span>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="txtPrecoServicoEditar" class="form-label">Preço</label>
                                    <input type="text" class="form-control"
                                           id="txtPrecoServicoEditar" name="txtPrecoServicoEditar">
                                    <span class="mensagem-erro d-none text-danger"></span>
                                </div>

                                <div class="col-12 col-md-6 mb-3">
                                    <label for="txtDuracaoServicoEditar" class="form-label">Duração</label>
                                    <input type="text" class="form-control"
                                           id="txtDuracaoServicoEditar" name="txtDuracaoServicoEditar">
                                    <span class="mensagem-erro d-none text-danger"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label for="descricaoServicoEditar" class="form-label">Descrição</label>
                                    <textarea class="form-control"
                                              id="descricaoServicoEditar" name="descricaoServicoEditar" rows="3"></textarea>
                                    <span class="mensagem-erro d-none text-danger"></span>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnFecharModal" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btnEditarServico">Editar Serviço</button>
            </div>
        </div>
    </div>
</div>
