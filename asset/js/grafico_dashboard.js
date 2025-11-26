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

    console.log(`Profissionais Ativos (Fixo): ${qtdProfissionaisAtivos}`);
    console.log(`Profissionais Desativados (API): ${qtdProfissionaisDesativados}`);

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

criarGraficoProfissionais();