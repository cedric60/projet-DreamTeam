$.ajax({
    type: 'GET',
    url: '/datasessionend',
    data: { 'id': $('select#end_date option:selected').val() },
    dataType: "json",
    async: false,
    success: function(data) {
        $("select#end_date").html(data);
    },
    error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
    }
});

$.ajax({
    url: '/datasessionstart',
    dataType: "text",
    async: false,
    success: function(data) {
        $("select#start_date").html(data);
    },
    error: function(request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
    }
});