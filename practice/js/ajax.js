let labels = [];

let data = {
    labels: labels,
    datasets: []
};

let config = {
    type: 'line',
    data: data,
    options: {}
};

function initSecidSelect() {
    let secid = document.getElementById("secid_select");
    $.ajax({
        url: "https://sedelkin.ru/api/security_list",
        method: "get",
        dataType: "json",
        data: {},
        success: function (data) {
            let optionArray = [];
            let arr = data.data;
            arr.forEach(function (item) {
                optionArray.push(createOptionElem(item.title, item.secid));
            })
            optionArray.forEach(function (item) {
                secid.append(item);
            });
        }
    });
}

function initIntervalSelect() {
    let interval = document.getElementById("interval_select");
    $.ajax({
        url: "https://sedelkin.ru/api/interval",
        method: "get",
        dataType: "json",
        data: {},
        success: function (data) {
            let optionArray = [];
            let arr = data.data;
            arr.forEach(function (item) {
                optionArray.push(createOptionElem(item.title, item.value));
            })
            optionArray.forEach(function (item) {
                interval.append(item);
            });
        }
    });
}

function clearChartData() {
    data.datasets = [];
    labels = [];
    data.labels = [];
}

function updateChart(chartName, dataObject) {
    let dataCharts = [];
    dataObject.forEach(function (item) {
        labels.push(item.datetime);
        dataCharts.push(parseFloat(item.close));
    });
    data.labels = labels;
    data.datasets.push({
        label: chartName,
        data: dataCharts,
        fill: true,
        borderColor: "rgba(88,125,246,0.84)",
        backgroundColor: "rgba(88,125,246,0.84)",
        tension: 1
    });

    myChart.update();
}

function getData(event) {
    event.preventDefault();
    let secid_index = document.getElementById('secid_select').options.selectedIndex;
    let interval_index = document.getElementById('interval_select').options.selectedIndex;
    let secid_value = document.getElementById('secid_select').options[secid_index].value;
    let interval_value = document.getElementById('interval_select').options[interval_index].value;
    let limits_value = document.getElementById('limit_value').value;
    let date_value = document.getElementById('date_value').value;
    $.ajax({
        url: "https://sedelkin.ru/api/history/get_data",
        method: "post",
        dataType: "json",
        data: {
            app_key: "lpDRhW4f%5Bj|i8mB~BjlCD#Ve6wAi",
            interval: interval_value,
            limits: limits_value,
            secid: secid_value,
            start: date_value,
            finish: ""
        },
        success: function (data) {
            if (data.status === "OK") {
                clearChartData();
                updateChart(data.secid, data.data);
            } else {
                console.log();
            }
        }
    })
}

function createOptionElem(title, value) {
    return new Option(title, value);
}

initSecidSelect();

initIntervalSelect();

let myChart = new Chart (
    document.getElementById('myChart'),
    config
)
