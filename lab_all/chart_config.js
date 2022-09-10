const labels = [
    'Уголь',
    'Древесина',
    'Нефть',
    'Газ',
];

const data = {
    labels: labels,
    datasets: [
        {
            label: 'Добыча (т.)',
            backgroundColor: 'rgb(0, 0, 255)',
            borderColor: 'rgb(0, 0, 255)',
            data: [500, 700, 420, 480],
        },
        {
            label: 'Обработка (т.)',
            backgroundColor: 'rgb(120, 219, 226)',
            borderColor: 'rgb(120, 219, 226)',
            data: [400, 330, 250, 390],
        },
        {
            label: 'Экспорт (т.)',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [200, 230, 140, 190],
        },
        {
            label: 'Импорт (т.)',
            backgroundColor: 'rgb(146,20,144)',
            borderColor: 'rgb(146,20,144)',
            data: [80, 90, 70, 40],
        }
    ]
};

const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

let myChart = new Chart(
    document.getElementById('myChart'),
    config
);

function changeColor() {
    let sel = document.getElementById("select");
    let colors =
        [
            "rgb(144, 144, 158)",
            "rgb(46, 72, 112)",
            "rgb(90, 30, 64)",
            "rgb(79, 86, 52)"
        ];

    data.datasets[3].backgroundColor = colors[sel.value];
    data.datasets[0].borderColor = colors[sel.value];
    myChart.update();
}
