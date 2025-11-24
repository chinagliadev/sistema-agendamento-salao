<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
    id="modalEditarProfissional" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditarLabel">
                    <i class="bi bi-pen"></i> Editar Profissional
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
                                    <div class="card-body bg-light p-0 d-flex justify-content-center align-items-center">
                                        <img id="preVizualizarImagemEditar" src=""
                                            class="img-fluid d-none"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                        <h2 id="textoPreVizualizacaoEditar"
                                            class="text-center text-muted fs-5">Foto do Profissional</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="arquivoFotoProfissionalEditar" class="form-label">Foto do profissional</label>
                                <input type="file" accept="image/*" class="form-control"
                                    id="arquivoFotoProfissionalEditar" name="arquivoFotoProfissionalEditar">
                            </div>

                            <div class="mb-3">
                                <label for="txtNomeProfissionalEditar" class="form-label">Nome</label>
                                <input type="text" class="form-control"
                                    id="txtNomeProfissionalEditar" name="txtNomeProfissionalEditar">
                                <span class="mensagem-erro d-none text-danger"></span>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="txtCpfProfissionalEditar" class="form-label">CPF</label>
                                    <input type="text" class="form-control"
                                        id="txtCpfProfissionalEditar" name="txtCpfProfissionalEditar">
                                    <span class="mensagem-erro d-none text-danger"></span>
                                </div>

                                <div class="col-12 col-md-6 mb-3">
                                    <label for="txtTelefoneProfissionalEditar" class="form-label">Telefone</label>
                                    <input type="text" class="form-control"
                                        id="txtTelefoneProfissionalEditar" name="txtTelefoneProfissionalEditar">
                                    <span class="mensagem-erro d-none text-danger"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="txtEmailProfissionalEditar" class="form-label">Email</label>
                                    <input type="email" class="form-control"
                                        id="txtEmailProfissionalEditar" name="txtEmailProfissionalEditar">
                                    <span class="mensagem-erro d-none text-danger"></span>
                                </div>

                                <div class="col-12 col-md-6 mb-3">
                                    <label for="txtEspecialidadeProfissionalEditar" class="form-label">Especialidade</label>
                                    <select id="txtEspecialidadeProfissionalEditar"
                                        name="txtEspecialidadeProfissionalEditar"
                                        class="form-select">

                                        <option value="" selected disabled>Selecione a especialidade</option>
                                        <option value="cabeleireiro">Cabeleireiro / Hair Stylist</option>
                                        <option value="corte-feminino">Corte feminino</option>
                                        <option value="corte-masculino">Corte masculino / Barbeiro</option>
                                        <option value="corte-infantil">Corte infantil</option>
                                        <option value="penteados">Penteados (noivas, festas)</option>
                                        <option value="colorista">Colorista</option>
                                        <option value="balayage">Balayage / Luzes</option>
                                        <option value="tonalizacao">Tonalização</option>
                                        <option value="descoloracao">Descoloração</option>
                                        <option value="tratamento-danificado">Tratamento danificado</option>
                                        <option value="progressiva">Progressiva</option>
                                        <option value="relaxamento">Relaxamento</option>
                                        <option value="permanente">Permanente</option>
                                        <option value="hidratacao">Hidratação</option>
                                        <option value="botox-capilar">Botox capilar</option>
                                        <option value="reconstrucao">Reconstrução</option>
                                        <option value="terapia-capilar">Terapia capilar</option>
                                        <option value="extensao">Extensões</option>
                                        <option value="trancas">Tranças</option>
                                        <option value="barbershop">Barbershop</option>
                                        <option value="consultoria-estilo">Consultoria de estilo</option>

                                    </select>

                                    <span class="mensagem-erro d-none text-danger"></span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btnFecharModalEditar"
                            data-bs-dismiss="modal">Fechar</button>

                        <button type="submit" class="btn btn-warning text-white" id="btnEditarProfissional">
                            Editar Profissional
                        </button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>