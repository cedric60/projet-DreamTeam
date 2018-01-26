/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    var email = $('#email');
    var password = $('#password');
    var password2 = $('#password2');
    var messageok = "Bravo votre mot de passe a bien été modifié";
    var message = "Merci de remplir ce champs";
    var messpass = "Veuillez saisir le meme mot de passe";
    var messageerreur = "Veuillez entrer l'email qui a servi à la reinitialisation"
    var formulaire = $('#reset');

    // Soumission du formulaire
    $('#reset').on('submit', function (e) {
        e.preventDefault(); // On empêche l'envoi du formulaire

        // On vérifie la longueur de la valeur sélectionnée dans le select
        // Les classes .has-error et .has-success proviennent de bootstrap et doivent être appliqué sur la classe parente .form-group
        if (email.val().length == 0) {
            email.parent().addClass('has-error');
            errors = true;
            email.css("border-color", "red");
            $("#msg_email").html(message);
        } else {
            email.parent().addClass('has-success');
            email.css("border-color", "green");
        }

        if (password2.val().length == 0) {
            password2.parent().addClass('has-error');
            errors = true;
            password2.css("border-color", "red");
            $("#msg_pass2").html(message);
        } else {
            password2.parent().addClass('has-success');
            password2.css("border-color", "green");
        }

        if (password.val().length == 0) {
            password.parent().addClass('has-error');
            errors = true;
            password.css("border-color", "red");
            $("#msg_pass").html(message);
        } else {
            password.parent().addClass('has-success');
            password.css("border-color", "green");
        }


        //Vérifier que les 2 mots de passe correspondent
        if (password.val() != password2.val()) {
            password.parent().addClass('has-error');
            errors = true;
            password2.css("border-color", "red");
            $("#msg_confirme").html(messpass);
        } else {
            password.parent().addClass('has-sucess');
            password2.css("border-color", "green");
        }

        if (errors === false) {

            $.ajax({
                url: "/reset-password.php",
                method: "POST",
                data: $("form").serialize(),
                success: function (data) { // Je récupère la réponse du fichier PHP
                    alert(data);
                    if (data == 1) {

                        $("#msg_confirme1").html(messageok);

                    } else {
                        $("#msg_confirme1").html(messageerreur);
                    }
                }

            });

        }


    });


    // On retire les classes .has-success ou .has-error dès que les champs changent

    email.on('change', function (e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });


    password.on('change', function (e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });

    password2.on('change', function (e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });

    function cacherFormulaire() {
        formulaire.css("display", "none");
    }


});

