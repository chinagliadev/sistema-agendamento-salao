const modalDesativar = document.getElementById('modalDesativarProfissional')

if(modalDesativar){
    modalDesativar.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const inputHidden = document.getElementById('inputIdProfissional')
        const nomeProfissional = document.getElementById('nomeProfissional')

        if(!inputHidden){
            console.error("Campo hidden 'inputIdProfissional' não encontrado no modal.");
            return;
        }
        
        nomeProfissional.textContent = button.getAttribute('data-nome')
        const idProfissional = button.getAttribute('data-id');

        inputHidden.value = idProfissional
        
    })
}