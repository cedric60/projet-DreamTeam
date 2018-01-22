$('select#formation').on('change', function() {
    $.ajax({
        type: 'GET',
        url: '/datasessionstart/' + $('select#formation option:selected').val(),
        dataType: "text",
        async: true,
        success: function(data) {
            $("select#start_date").html(data);
        },
        error: function(request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
        }
    });
    $.ajax({
        type: 'GET',
        url: '/datasessionend/' + $('select#formation option:selected').val(),
        dataType: "text",
        async: true,
        success: function(data) {
            $("select#end_date").html(data);
        },
        error: function(request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
        }
    });

})