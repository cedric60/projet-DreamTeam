$("#commentsDiv").hide();
$('#comments').on('click', function(e) {
    e.preventDefault();
    $("#commentsDiv").toggle();

});