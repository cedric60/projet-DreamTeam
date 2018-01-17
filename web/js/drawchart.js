google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);


function drawChart() {
    var jsonData = $.ajax({
        url: "/dataCharts1",
        dataType: "json",
        async: false
    }).responseText;

    var options = {
        title: 'Satisfaction des apprenants',
        pieHole: 0.4,
        width: 650,
        height: 350,
    };

    var data = new google.visualization.DataTable(jsonData);

    var chart = new google.visualization.PieChart(document.getElementById('draw_chart'));
    chart.draw(data, options);
}