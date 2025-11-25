async function carregarProfissionais() {
    
    fetch('../api/profissionais/listar_profissionais.php')
        .then(response => response.json()) 
        .then(profissionais => {
            console.log("Dados carregados com sucesso:", profissionais);
            if (profissionais.length > 0) {
                console.log("Primeiro profissional:", profissionais[0].nome); 
            }
        })
        .catch(error => {
            console.error('Erro ao carregar os profissionais:', error);
        });
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
