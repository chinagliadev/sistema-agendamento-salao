<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-briefcase"></i> Cadastrar Profissional</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="arquivoFotoProfissional" class="form-label">Foto do profissional</label>
                                <input type="file" class="form-control" id="arquivoFotoProfissional">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="txtNomeProfissional" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="txtNomeProfissional" id="txtNomeProfissional">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="txtCpfProfissional" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="txtCpfProfissional">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="txtTelefoneProfissional" class="form-label">Telefone</label>
                                <input type="text" class="form-control" name="txtTelefoneProfissional" id="txtNomeProfissional">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="txtEspecialidadeProfissional" class="form-label">Especialidade</label>
                                <input type="text" class="form-control" name="txtEspecialidadeProfissional" id="txtEspecialidadeProfissional">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="txtEmailProfissional" class="form-label">Email</label>
                                <input type="email" class="form-control" name="txtEmailProfissional" id="txtEmailProfissional">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Cadastrar Profissional</button>
            </div>
        </div>
    </div>
</div>