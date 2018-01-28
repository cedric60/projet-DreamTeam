$('#button').on('click', function (e) {

    e.preventDefault();

    var re = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/,
            id = parseInt($('#learnerId').val()),
            lastname = $('#lastname').val(),
            firstname = $('#firstname').val(),
            mail = $('#mail').val(),
            phonenumber = $('#phonenumber').val();

    $error = false;

    if (lastname.length == 0 || lastname.length > 45) {
        document.getElementById('erreurlastname').innerHTML = 'valeur incorrecte';
        $('#lastname').css({
            borderColor: 'red',
            color: 'red'
        });
        $error = true;
    } else {
        document.getElementById('erreurlastname').innerHTML = '';
        $('#lastname').css({
            borderColor: '#ced4da',
            color: '#4976b9'
        });
    }

    if (firstname.length == 0 || firstname.length > 45) {
        document.getElementById('erreurfirstname').innerHTML = 'valeur incorrecte';
        $('#firstname').css({
            borderColor: 'red',
            color: 'red'
        });
        $error = true;
    } else {
        document.getElementById('erreurfirstname').innerHTML = '';
        $('#firstname').css({
            borderColor: '#ced4da',
            color: '#4976b9'
        });
    }
    if (mail.length == 0 || mail.length > 45) {
        document.getElementById('erreurmail').innerHTML = 'valeur incorrecte';
        $('#mail').css({
            borderColor: 'red',
            color: 'red'
        });
        $error = true;
    } else {
        document.getElementById('erreurmail').innerHTML = '';
        $('#mail').css({
            borderColor: '#ced4da',
            color: '#4976b9'
        });
    }
    if (!re.test(mail)) {
        document.getElementById('erreurmail').innerHTML = 'valeur incorrecte';
        $('#mail').css({
            borderColor: 'red',
            color: 'red'
        });
        $error = true;
    } else {
        document.getElementById('erreurmail').innerHTML = '';
        $('#mail').css({
            borderColor: '#ced4da',
            color: '#4976b9'
        });
    }

    if (isNaN(phonenumber) || phonenumber.length > 10) {
        document.getElementById('erreurphone').innerHTML = 'valeur incorrecte';
        $('#phonenumber').css({
            borderColor: 'red',
            color: 'red'
        });
        $error = true;
    } else {
        document.getElementById('erreurphone').innerHTML = '';
        $('#phonenumber').css({
            borderColor: '#ced4da',
            color: '#4976b9'
        });
    }

    if ($error == false) {
        $('#modifLearnerForm').submit();
    }
});