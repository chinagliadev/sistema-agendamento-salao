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

var calendarEl = document.getElementById('calendar');

var calendar = new FullCalendar.Calendar(calendarEl, {
  initialView: 'dayGridMonth',
  locale: 'pt-br',
  events: '../api/agendamentos/calendario.php',
  
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,timeGridDay'
  },

  buttonText: {
    today: 'Hoje',
    month: 'Mês',
    week: 'Semana',
    day: 'Dia'
  },

  eventTimeFormat: {
    hour: '2-digit',
    minute: '2-digit',
    hour12: false
  },

  height: 450,          
  dayMaxEvents: true,    
  eventDisplay: 'block',  
  eventDidMount: function(info) {
    info.el.style.padding = '0.4rem 0.6rem'; 
    info.el.style.borderRadius = '4px';     
  }
});

calendar.render();

