const inputAgendamento = document.getElementById('campo_agenda');

if (inputAgendamento) {
    inputAgendamento.addEventListener('input', (e) => {
        const pesquisa = e.target.value.toLowerCase();

        const tabelas = document.querySelectorAll('table');

        for (const tabela of tabelas) {
            const linhas = tabela.querySelectorAll('tbody tr:not(.msg-vazio)');
            const msgVazio = tabela.querySelector('.msg-vazio');

            let encontrou = false;

            for (const agendamento of linhas) {
                const texto = agendamento.textContent.toLowerCase();

                if (texto.includes(pesquisa)) {
                    agendamento.style.display = '';
                    encontrou = true;
                } else {
                    agendamento.style.display = 'none';
                }
            }

            if (msgVazio) {
                msgVazio.style.display = encontrou ? 'none' : '';
            }
        }
    });
}
