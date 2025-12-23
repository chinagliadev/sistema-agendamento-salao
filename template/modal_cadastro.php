<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-briefcase"></i> Cadastrar Profissional</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCadastroProfissional" action="../controller/ProfissionalController.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-2">
                        <div class="col-12 col-md-4">
                            <div class="conteudo-img mb-3 w-100" id="colunaFoto">
                                <div class="card" style="width: 220px; height: 220px;">
                                    <div class="card-body bg-light p-0 d-flex justify-content-center align-items-center">
                                        <img id="preVizualizarImagem" src="" class="img-fluid d-none" style="width: 100%; height: 100%; object-fit: cover;">
                                        <h2 id="textoPreVizualizacao" class="text-center text-muted fs-5">Foto do Profissional</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="arquivoFotoProfissional" class="form-label">Foto do profissional</label>
                                <input type="file" accept="image/*" class="form-control" id="arquivoFotoProfissional" name="arquivoFotoProfissional">
                            </div>
                            <div class="mb-3">
                                <label for="txtNomeProfissional" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="txtNomeProfissional" name="txtNomeProfissional">
                                <span class="mensagem-erro d-none text-danger"></span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="txtCpfProfissional" class="form-label">CPF</label>
                                    <input type="text" class="form-control" id="txtCpfProfissional" name="txtCpfProfissional">
                                    <span class="mensagem-erro d-none text-danger"></span>
                                    <input type="hidden" name="cpf" id="cpf_hidden">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="txtTelefoneProfissional" class="form-label">Telefone</label>
                                   <input type="text" class="form-control" name="txtTelefoneProfissional" id="txtTelefoneProfissional">
                                    <span class="mensagem-erro d-none text-danger"></span>
                                    <input type="hidden" name="telefone" id="telefone_hidden">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="txtEmailProfissional" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="txtEmailProfissional" name="txtEmailProfissional">
                                    <span class="mensagem-erro d-none text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnFecharModal" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btnCadastrarProfissional">Cadastrar Profissional</button>
            </div>
        </div>
    </div>
</div>