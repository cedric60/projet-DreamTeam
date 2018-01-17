google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(column_chart);


function column_chart() {

    var jsonData = $.ajax({
        url: '/dataCharts',
        dataType: "json",
        async: false,
        success: function(jsonData) {
            var data = new google.visualization.arrayToDataTable(jsonData);
            var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
            chart.draw(data);
        }
    }).responseText;
}