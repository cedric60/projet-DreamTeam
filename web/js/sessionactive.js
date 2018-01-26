$(document).ready(function() {
    $(".flip").on("click", function() {
        console.log($(this).attr("id"));
        $.ajax({
            type: 'GET',
            url: '/sessionactive/' + $(this).attr("id"),
            dataType: "text",
            async: true,
            success: function(data) {
                var rep = jQuery.parseJSON(data);
                var res = '';
                for (var i = 1; i < rep.length + 1; i++) {
                    res += "Du " + rep[0]['start_date'] + " au " + rep[0]['end_date'] + "\n";
                }
                $("span.session_active").html(res);
            },
            error: function(error) {
                alert(" Can't do because: " + error);
            }
        });
    });
});