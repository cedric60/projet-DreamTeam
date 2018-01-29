$(function () {
    var nom = $('#nom');
    var telephone = $('#telephone');
    var email = $('#email');
    var password = $('#password');
    var password2 = $('#password2');
    var errors = false;
    var message = "Merci de remplir ce champs";
    var messpass = "Veuillez saisir le meme mot de passe";
    var messageerreur = "L'enregistrement n'a pas été effectué, cet email est déja utilisé !!!";
    var messageok = "L'utilisateur a bien été ajouté";
    var formulaire = $('#register');

    // Soumission du formulaire
    $('#register').on('submit', function (e) {
        e.preventDefault(); // On empêche l'envoi du formulaire

        // On vérifie la longueur de la valeur sélectionnée dans le select
        // Les classes .has-error et .has-success proviennent de bootstrap et doivent être appliqué sur la classe parente .form-group

        // On vérifie la longueur des champs (minimum 1 caractères)
        if (email.val().length == 0) {
            email.parent().addClass('has-error');
            errors = true;
            email.css("border-color", "red");
            $("#msg_email").html(message);
        } else {
            email.parent().addClass('has-success');
            email.css("border-color", "green");
        }

        if (nom.val().length == 0) {
            nom.parent().addClass('has-error');
            errors = true;
            nom.css("border-color", "red");
            $("#msg_nom").html(message);
        } else {
            nom.parent().addClass('has-success');
            nom.css("border-color", "green");
        }


        if (telephone.val().length == 0) {
            telephone.parent().addClass('has-error');
            errors = true;
            telephone.css("border-color", "red");
            $("#msg_tel").html(message);
        } else {
            telephone.parent().addClass('has-success');
            telephone.css("border-color", "green");
        }

        //Vérifier que les 2 mots de passe correspondent
        if (password.val() != password2.val()) {
            password.parent().addClass('has-error');
            errors = true;
            password2.css("border-color", "red");
            $("#msg_confirme2").html(messpass);
        } else {
            password.parent().addClass('has-sucess');
            password2.css("border-color", "green");
        }

        if (errors === false) {

            $.ajax({
                url: "/saveregister",
                method: "GET",
                data: $("form").serialize(),
                success: function (data) { // Je récupère la réponse du fichier PHP

                    if (data === "1") {

                        $("#msg_confirme1").html(messageok);
                        cacherFormulaire();
                    } else {
                        
                        $("#msg_confirme1").html(messageerreur);
                    }
                }



            });

        }


    });


    // On retire les classes .has-success ou .has-error dès que les champs changent
    nom.on('change', function (e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });

    telephone.on('change', function (e) {
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    });

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
