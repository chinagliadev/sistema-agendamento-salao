function configurarModal(elementoModal, nomeElementoId, inputElementoId, inputAcaoId) {
    if (!elementoModal) {
        return;
    }

    const nomeElement = document.getElementById(nomeElementoId);
    const inputElement = document.getElementById(inputElementoId);
    const inputAcaoElement = document.getElementById(inputAcaoId);

    if (!nomeElement || !inputElement || !inputAcaoElement) {
        console.error(`Um ou mais elementos necessários para o modal ${elementoModal.id} não foram encontrados.`);
        return;
    }

    elementoModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;

        nomeElement.textContent = button.getAttribute('data-nome');
        const idProfissional = button.getAttribute('data-id');
        const acaoElemento = button.getAttribute('data-acao');

        inputElement.value = idProfissional;
        inputAcaoElement.value = acaoElemento;
    });
}

const modalDesativar = document.getElementById('modalDesativarProfissional');
const modalAtivar = document.getElementById('modalAtivarProfissional');

configurarModal(modalDesativar, 'nomeProfissional', 'inputIdProfissional', 'acaoProfissional');
configurarModal(modalAtivar, 'nomeProfissional', 'inputIdProfissionalAtivar', 'acaoProfissionalAtivar');


function configurarModalEditar(elementoModal) {

    if (!elementoModal) return;

    elementoModal.addEventListener('show.bs.modal', event => {

        const button = event.relatedTarget;

        const idProfissional = button.getAttribute('data-id');
        const nomeProfissional = button.getAttribute('data-nome');
        const especialidadeProfissional = button.getAttribute('data-especialidade');
        const telefoneProfissional = button.getAttribute('data-telefone');
        const emailProfissional = button.getAttribute('data-email');
        const cpfProfissional = button.getAttribute('data-cpf');
        const fotoProfissional = button.getAttribute('data-foto');

        const inputIdHidden = document.getElementById('id_profissional');
        const inputAcaoHidden = document.getElementById('acaoProfissional');

        const inputNome = document.getElementById('txtNomeProfissionalEditar');
        const inputCpf = document.getElementById('txtCpfProfissionalEditar');
        const inputTelefone = document.getElementById('txtTelefoneProfissionalEditar');
        const inputEmail = document.getElementById('txtEmailProfissionalEditar');
        const inputEspecialidade = document.getElementById('txtEspecialidadeProfissionalEditar');

        const imgPreview = document.getElementById('preVizualizarImagemEditar');
        const textoPreview = document.getElementById('textoPreVizualizacaoEditar');

        inputIdHidden.value = idProfissional;
        inputAcaoHidden.value = "editar_profissional";

        inputNome.value = nomeProfissional;
        inputCpf.value = cpfProfissional;
        inputTelefone.value = telefoneProfissional;
        inputEmail.value = emailProfissional;
        inputEspecialidade.value = especialidadeProfissional;

        if (fotoProfissional && fotoProfissional.trim() !== "") {
            imgPreview.src = fotoProfissional;
            imgPreview.classList.remove("d-none");
            textoPreview.classList.add("d-none");
        } else {
            imgPreview.src = "";
            imgPreview.classList.add("d-none");
            textoPreview.classList.remove("d-none");
        }
    });
}


const modalEditar = document.getElementById('modalEditarProfissional');
configurarModalEditar(modalEditar);

function configurarPreviewFotoEditar() {
    const inputFoto = document.getElementById('arquivoFotoProfissionalEditar');
    const imgPreview = document.getElementById('preVizualizarImagemEditar');
    const textoPreview = document.getElementById('textoPreVizualizacaoEditar');
    const modalEditar = document.getElementById('modalEditarProfissional');
    
    if (!inputFoto || !imgPreview || !textoPreview || !modalEditar) {
        return;
    }
    
    inputFoto.addEventListener('change', () => {
        const arquivo = inputFoto.files[0];
        if (!arquivo) return;
        
        const reader = new FileReader();
        
        reader.onload = e => {
            imgPreview.src = e.target.result;
            imgPreview.classList.remove('d-none');
            textoPreview.classList.add('d-none');
        };
        
        reader.readAsDataURL(arquivo);
    });
    
    modalEditar.addEventListener('hidden.bs.modal', () => {
        inputFoto.value = "";
        imgPreview.src = "";
        imgPreview.classList.add('d-none');
        textoPreview.classList.remove('d-none');
        
    });
}

configurarPreviewFotoEditar();

function configurarModalDetalhes() {
    const modalDetalhes = document.getElementById('modalDetalhesProfissional')
    
    modalDetalhes.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        
        const nomeProfissional = button.getAttribute('data-nome');
        const telefoneProfissional = button.getAttribute('data-telefone');
        const emailProfissional = button.getAttribute('data-email');
        const cpfProfissional = button.getAttribute('data-cpf');
        const fotoProfissional = button.getAttribute('data-foto');
        const textoPreview = document.getElementById('textoPreVizualizacaoDetalhes');

        console.log(telefoneProfissional)
        
        document.getElementById('campo_nome').textContent = nomeProfissional;
        document.getElementById('campo_telefone').textContent = telefoneProfissional;
        document.getElementById('campo_email').textContent = emailProfissional;
        document.getElementById('campo_cpf').textContent = cpfProfissional;

        const imgFoto = document.getElementById('preVizualizarImagemDetalhes'); 

        if (imgFoto && fotoProfissional) {
            imgFoto.src = fotoProfissional;
            imgFoto.classList.remove('d-none'); 
            textoPreview.classList.add('d-none')
        } else if (imgFoto) {
            imgFoto.src = '';
            imgFoto.classList.add('d-none'); 
        }

    })
}

configurarModalDetalhes()
