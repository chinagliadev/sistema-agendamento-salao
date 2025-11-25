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

carregarProfissionais();

const ctx = document.getElementById('myChart');

const chartData = {
    labels: [
        'Ativados',
        'Desativados',
    ],
    datasets: [{
        label: 'Profissionais',
        data: [10, 20],

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
