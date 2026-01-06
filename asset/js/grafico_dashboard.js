async function carregarProfissionais() {
    try {
        const response = await fetch('../api/profissionais/listar_profissionais.php');
        const dados = await response.json();
        return dados;
    } catch (error) {
        console.error('Erro ao carregar os profissionais:', error);
        return [];
    }
}

async function contarProfissionaisDesativados() {
    const dados = await carregarProfissionais();

    const profissionaisDesativados = dados.filter(profissional => profissional.ativo === '1');

    return profissionaisDesativados.length;
}



async function contarProfissionaisAtivos() {
    const dados = await carregarProfissionais();

    const profissionaisAtivos = dados.filter(profissional => profissional.ativo === '0');

    return profissionaisAtivos.length;
}

async function criarGraficoProfissionais() {
    const qtdProfissionaisDesativados = await contarProfissionaisDesativados();

    const qtdProfissionaisAtivos = await contarProfissionaisAtivos();

    const ctx = document.getElementById('myChart');

    const chartData = {
        labels: [
            'Ativados',
            'Desativados',
        ],
        datasets: [{
            label: 'Profissionais',
            data: [qtdProfissionaisDesativados, qtdProfissionaisAtivos],

            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgba(86, 255, 103, 1)',
            ]
        }]
    };

    new Chart(ctx, {
        type: 'doughnut',
        data: chartData,
        options: {
            responsive: true
        }
    });
}

async function CarregarQuantidadeAgendamentosPorServico() {
    try {
        const response = await fetch('../api/agendamentos/qtd_servicos_agendados.php');

        if (!response.ok) {
            throw new Error('Erro ao buscar dados');
        }

        return await response.json();
    } catch (error) {
        console.error(error);
        return [];
    }
}
async function criarGraficoBarrasQtdServicosAgendados() {
    const dados = await CarregarQuantidadeAgendamentosPorServico();

    const ctx = document.getElementById('myChartQtdServico');

    const cores = [
        '#4e73df',
        '#1cc88a',
        '#36b9cc',
        '#f6c23e',
        '#e74a3b',
        '#858796'
    ];

    const datasets = dados.map((item, index) => ({
        label: item.servico,
        data: [item.total],
        backgroundColor: cores[index % cores.length]
    }));

    const data = {
        labels: ['Quantidade'],
        datasets: datasets
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Serviços mais agendados'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    new Chart(ctx, config);
}

async function carregarAgendamentosUltimos7Dias() {
    try {
        const response = await fetch('../api/agendamentos/agendamentos_7_dias.php');
        return await response.json();
    } catch (error) {
        console.error(error);
        return [];
    }
}

async function criarGraficoAgendamentos7Dias() {
    const dados = await carregarAgendamentosUltimos7Dias();

    const labels = dados.map(item => {
        const data = new Date(item.data);
        return data.toLocaleDateString('pt-BR', {
            day: '2-digit',
            month: '2-digit'
        });
    });

    const valores = dados.map(item => item.total);

    const ctx = document.getElementById('myChart7Dias');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Agendamentos',
                data: valores,
                borderColor: '#198754',
                backgroundColor: 'rgba(25, 135, 84, 0.2)',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Agendamentos nos últimos 7 dias'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
}

criarGraficoAgendamentos7Dias();

criarGraficoBarrasQtdServicosAgendados();

criarGraficoProfissionais();

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
  }
});

calendar.render();
