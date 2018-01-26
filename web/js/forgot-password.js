/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    var email = $('#email');

    var message = "Merci de remplir ce champs";
    var messageconfirme = "Votre demande a été prise en compte, nous venons de vous envoyez un email";
    var messageerreur = "Cet addresse email n'est pas reconnu";


    // Soumission du formulaire
    $('#fp').on('submit', function (e) {
        e.preventDefault(); // On empêche l'envoi du formulaire

        // On vérifie la longueur de la valeur sélectionnée dans le select
        // Les classes .has-error et .has-success proviennent de bootstrap et doivent être appliqué sur la classe parente .form-group

        // On vérifie la longueur des champs (minimum 4 caractères)
        if (email.val().length == 0) {
            email.parent().addClass('has-error');
            errors = true;
            email.css("border-color", "red");
            $("#msg_email").html(message);
        } else {
            email.parent().addClass('has-success');
            email.css("border-color", "green");
        }



        if (errors === false) {

            $.ajax({
                url: "/resetpasswordvalid",
                method: "GET",
                data: $("form").serialize(),
                success: function (data) { // Je récupère la réponse du fichier PHP
                    alert(data);
                    if (data == 1) {
                        $("#msg_confirme").html(messageconfirme);
                    } else {
                        $("#msg_confirme").html(messageerreur);
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



});

