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
$('#button').on('click', function(e) {
    e.preventDefault();
    var $idformation = $("select#formation option:selected").val() + '/',
        $start = $("input#start-date").val() + '/',
        $end = $("input#end-date").val();

    var $url = $idformation + $start + $end;

    console.log(($("select#formation option:selected").val()));
    if (($("select#formation option:selected").val()) == "all") {


    } else {
        $.ajax({
            type: 'GET',
            url: "/dataCharts2/" + $url,
            dataType: "json",
            async: true,
            success: function drawChart2() {

                var jsonData2 = $.ajax({
                    url: "/dataCharts2/" + $url,
                    dataType: "json",
                    async: false
                }).responseText;

                var options2 = {
                    title: 'Satisfaction des apprenants',
                    pieHole: 0.4,
                    width: 650,
                    height: 350,
                };

                var data2 = new google.visualization.DataTable(jsonData2);

                var chart2 = new google.visualization.PieChart(document.getElementById('draw_chart'));
                chart2.draw(data2, options2);

            },
            error: function(request, error) {
                console.log(arguments);
                alert("aucune données disponibles");
            }
        });
    }
});