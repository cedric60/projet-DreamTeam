$('select#formation').on('change', function () {

    if ($('select#formation option:selected').val() == 9999) {
        $('#newformationdiv').css({
            display: 'block'
        })
    }
})

$('#button').on('click', function (e) {

    e.preventDefault();
    var $selectFormation = $('select#formation option:selected').val(),
            $newformation = $('#newformation').val(),
            $start = $('#start_date').val(),
            $end = $('#end_date').val();


    $error = false;

    if ($selectFormation == 0) {
        document.getElementById('erreurformation').innerHTML = 'valeur incorrecte';
        $('#formation').css({
            borderColor: 'red',
            color: 'red'
        });
        $error = true;
    } else {
        document.getElementById('erreurformation').innerHTML = '';
        $('#formation').css({
            borderColor: '#ced4da',
            color: '#4976b9'
        });
    }
    if ($selectFormation == 9999) {
        if ($newformation == "") {
            document.getElementById('erreurnewformation').innerHTML = 'valeur incorrecte';
            $('#newformation').css({
                borderColor: 'red',
                color: 'red'
            });
            $error = true;
        } else {
            document.getElementById('erreurnewformation').innerHTML = '';
            $('#newformation').css({
                borderColor: '#ced4da',
                color: '#4976b9'
            });
        }
    }
    if ($start == "") {
        document.getElementById('erreurstart').innerHTML = 'valeur incorrecte';
        $('#start_date').css({
            borderColor: 'red',
            color: 'red'
        });
        $error = true;
    } else {
        document.getElementById('erreurstart').innerHTML = 'valeur incorrecte';
        $('#start_date').css({
            borderColor: '#ced4da',
            color: '#4976b9'
        });
    }
    if ($end == "") {
        document.getElementById('erreurend').innerHTML = 'valeur incorrecte';
        $('#end_date').css({
            borderColor: 'red',
            color: 'red'
        });
        $error = true;
    } else {
        document.getElementById('erreurend').innerHTML = 'valeur incorrecte';
        $('#end_date').css({
            borderColor: '#ced4da',
            color: '#4976b9'
        });
    }

    if ($error == false) {
        $('#addformationform').submit();
    }
})