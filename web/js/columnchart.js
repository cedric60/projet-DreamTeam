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
$('#button2').on('click', function(e) {
    e.preventDefault();
    var $idformation2 = $("select#formation2 option:selected").val() + '/',
        $start2 = $("input#start-date2").val() + '/',
        $end2 = $("input#end-date2").val();

    var $url2 = $idformation2 + $start2 + $end2;

    console.log(($("select#formation2 option:selected").val()));
    if (($("select#formation2 option:selected").val()) == "all") {


    } else {
        $.ajax({
            type: 'GET',
            url: "/dataCharts3/" + $url2,
            dataType: "json",
            async: true,
            success: function columnChart2() {

                var jsonData2 = $.ajax({
                    url: "/dataCharts3/" + $url2,
                    dataType: "json",
                    async: false
                }).responseText;
                console.log(jsonData2);
                var data2 = new google.visualization.arrayToDataTable($.parseJSON(jsonData2));

                var chart2 = new google.visualization.ColumnChart(document.getElementById('column_chart'));
                chart2.draw(data2);

            },
            error: function(request, error) {
                console.log(arguments);
                alert("aucune données disponibles");
            }
        });
    }
});